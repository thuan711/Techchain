<?php
namespace App\Http\Controllers;

use App\Models\Binhluan;
use App\Models\Chitietsp;
use App\Models\Chitietdonhang;
use App\Models\Sanpham;
use App\Imports\ImportSP;
use App\Exports\ExportSP;
use Excel;
use PDF;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
Paginator::useBootstrap();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ThanhToanSuccessEmail;
use App\Http\Requests\RuleThanhToan;
use Session;
use Illuminate\Support\Facades\Mail;
class SanphamController extends Controller
{
    public function __construct() {
        $loaisp = DB::table('loai')->where('anhien',1 )->orderBy('thutu')->get();
        \View::share( 'loaisp', $loaisp);
    }
    function index(){
        $spnoibat = DB::table('sanpham')->where('hot', 1)->orderBy('ngay', 'desc')->limit(8)->get();
        $sphot = DB::table('sanpham')->where('hot', 1)->orderBy('soluotxem', 'desc')->limit(1)->get();
        $spxemnhieu = DB::table('sanpham')->orderBy('soluotxem', 'desc')->limit(8)->get();
        return view('home', [
            'spnoibat' => $spnoibat,
            'sphot' => $sphot,
            'spxemnhieu' => $spxemnhieu,
        ]);
    }
    function sanphams(Request $request){
        $perpage = 12;
        $sanphams = DB::table('sanpham')->get();
        $loai = DB::table('loai')->get();
        
        $tukhoa = $request->has('tukhoa') ? $request->query('tukhoa') : "";
        $tukhoa = trim(strip_tags($tukhoa));
        
        $listsp = DB::table("sanpham")
            ->when($tukhoa != "", function ($query) use ($tukhoa) {
                return $query->where("ten_sp", "like", "%$tukhoa%");
            })
            ->paginate($perpage)
            ->withQueryString();
        
        if ($tukhoa != "") {
            $listsp->appends(['tukhoa' => $tukhoa]);
        }
        
        return view('sanpham', [
            'spall' => $sanphams,
            'listsp' => $listsp,
            'loai' => $loai,
            'tukhoa' => $tukhoa 
        ]);
    }
    
    
    function chitiet($id=0){
        $sp = DB::table('sanpham')->where ('id_sp','=', $id)->first();   
        $idsp = $sp->id_sp;
        $tc = $sp->tinhchat;
        $idloai = $sp->id_loai;     
        $splienquan = DB::table('sanpham')->
        where ('id_loai', $idloai)->
        where('tinhchat', $tc)->
        orderBy('ngay','desc')->
        limit(3)->get()->except($idsp);  
        $ct = Chitietsp::where('id_sp', $id)->get();
        $bl = DB::table('binhluan')->where('id_sp','=', $id)->get();
        return view ('chitietsp', ['id'=>$id, 'title'=>$sp->ten_sp, 'sp'=>$sp, 'splienquan'=>$splienquan, 'ct'=>$ct, 'bl'=>$bl] );
    }
    public function sort($order)
    {
        $perpage = 12;
        $products = Sanpham::orderBy('ten_sp', $order)->get()->paginate($perpage)
        ->withQueryString();;
        $loai = DB::table('loai')->get();
        return view('spsort', ['products' => $products,'loai' => $loai]);
    }
    function sptrongloai($slugloai = null){
        $perpage = 12;
        $loai = DB::table('loai')->get();
        $tenloai = null;
        $listsp = collect(); // Tạo một bộ sưu tập trống ban đầu
    
        if ($slugloai) {
            // Lấy thông tin tên loại dựa trên slug
            $tenloai = DB::table('loai')->where('slug', $slugloai)->value('ten_loai');
    
            // Lấy danh sách sản phẩm dựa trên slug của loại
            $listsp = DB::table('sanpham')
                ->join('loai', 'sanpham.id_loai', '=', 'loai.id_loai')
                ->where('loai.slug', $slugloai)
                ->paginate($perpage)
                ->withQueryString();
        }
    
        return view('sptrongloai', [
            'loai' => $loai,
            'slug' => $slugloai,
            'title' => $tenloai,
            'listsp' => $listsp,
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'sdt' => 'required',
            'noidung' => 'required',
        ]);
        Binhluan::create($validatedData);
        return redirect()->route('chitietsp');
    }
    function themvaogio(Request $request, $id_sp = 0, $soluong=1){
        /*
        cart = [
            ['id_sp'=>1, 'soluong'=>3],
            ['id_sp'=>5, 'soluong'=>9],
        ]
         */
        if ($request->session()->exists('cart')==false) {//chưa có cart trong session           
            $request->session()->push('cart', ['id_sp'=> $id_sp, 'soluong'=> $soluong]); 
        } else {// đã có cart, kiểm tra id_sp có trong cart không
            $cart = $request->session()->get('cart'); 
            $index = array_search($id_sp, array_column($cart, 'id_sp'));
            if ($index!=''){ //id_sp có trong giỏ hàng thì tăhg số lượng
                $cart[$index]['soluong']+=$soluong;
                $request->session()->put('cart', $cart);
            }
            else { //sp chưa có trong arrary cart thì thêm vào 
                $cart[]= ['id_sp'=> $id_sp, 'soluong'=> $soluong];
                $request->session()->put('cart', $cart);
            }
        }
        // echo "<pre>";
        // print_r($request->session()->get('cart'));
        // $request->session()->forget('cart');
        return redirect('/hiengiohang');
    }
    function hiengiohang(Request $request){
        $cart = $request->session()->get('cart'); 
        if($cart !== null ){
            return view('hiengiohang', ['cart'=> $cart]);
        }else{
            Session::flash('statusAlert','info');
            return redirect('/')->with('status', 'Chưa có sản phẩm');
        }
    }
    function xoasptronggio(Request $request, $id_sp=0){
        $cart = $request->session()->get('cart'); 
        $index = array_search($id_sp, array_column($cart, 'id_sp'));
        if ($index!=''){ 
            array_splice($cart, $index, 1);
            $request->session()->put('cart', $cart);
        }
        return redirect('/hiengiohang');
    }
    function thanhtoan(Request $request){
        $cart = $request->session()->get('cart'); 
        return view('thanhtoan', ['cart'=> $cart]);
    }
    function thanhtoan_(RuleThanhToan $request){
        $arr = $request->post();
        $tennguoinhan = ($request->has('tennguoinhan')) ? $arr['tennguoinhan'] : "";
        $email = ($request->has('email')) ? $arr['email'] : "";
        $dienthoai = ($request->has('dienthoai')) ? $arr['dienthoai'] : "";
        $diachigiaohang = ($request->has('diachigiaohang')) ? $arr['diachigiaohang'] : "";
        $tongtien = $request['tongtien'];
        $id_user = Auth::id();
        $cart = session()->get('cart');
        $dh = new \App\Models\Donhang;
        $dh->tennguoinhan = $tennguoinhan;
        $dh->email = $email;
        $dh->dienthoai = $dienthoai;
        $dh->diachigiaohang = $diachigiaohang;
        $dh->tongtien = $tongtien;
        $dh->id_user = $id_user;
        $dh->save();
        $id_dh = $dh->id_dh;

        // Lưu thông tin chi tiết đơn hàng vào bảng "Chi tiết đơn hàng"
        foreach ($cart as $item) {
            $id_sp = $item['id_sp'];
            $soluong = $item['soluong'];
            $ten_sp = DB::table('sanpham')->where('id_sp', '=', $id_sp)->value('ten_sp');
            $gia = DB::table('sanpham')->where('id_sp', '=', $id_sp)->value('gia');
    
            // Tạo đối tượng "Chi tiết đơn hàng" và lưu vào database
            $ctdh = new \App\Models\ChiTietDonHang;
            $ctdh->id_dh = $id_dh;
            $ctdh->id_sp = $id_sp;
            $ctdh->ten_sp = $ten_sp;
            $ctdh->soluong = $soluong;
            $ctdh->gia = $gia;
            $ctdh->save();
        }
        $orderInfo = [
            'tong_tien' => $tongtien,
            'ten_nguoi_nhan' => $tennguoinhan,
            'dia_chi_giao_hang' => $diachigiaohang,
            'dien_thoai' => $dienthoai,
        ];
        Mail::to($email)->send(new ThanhToanSuccessEmail($orderInfo));
        $request->session()->forget('cart');
        Session::flash('statusAlert','success');
        return redirect('/')->with('status', 'Đặt hàng thành công');
    }
    function chitietdh(Request $request){
        $arr = $request->post();
    }
    function download(){ return view("download"); }

    // function donhang(Request $request){
    //     $request->validate([
    //         'cateName' => 'required|min:3',
    //     ],
    //     [
    //         'cateName.required' => 'Vui lòng không để trống form',
    //         'cateName.min' => 'Danh mục tối thiểu 3 kí tự',
    //     ]
    //     );
    //     $cate = new Category();
    //     $cate->name=$request->cateName;
    //     $cate->Save();
    //     return redirect('listcate')->with('success','Thêm danh mục thành công');
    // }

    public function export_scv(){
        return Excel::download(new ExportSP , 'product.xlsx');
    }
    public function import_scv(Request $request){
        $path = $request -> file('file')->getRealPath();
        Excel::import(new ImportSP , $path);
        return back();
    }
    public function vnpay_payment(Request $request){
        $tongtien = $request['tongtien'];
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/thanhtoan";
        $vnp_TmnCode = "SFYZDJ9M";//Mã website tại VNPAY 
        $vnp_HashSecret = "FGLBZNBKOAXKDDRMYBLMTWSRQGONITWJ"; //Chuỗi bí mật
        $code_cart= rand(00,99999);             
        $vnp_TxnRef = $code_cart; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayemnt';
        $vnp_Amount = $tongtien * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo        
    }
    public function execPostRequest($url, $data){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request){

        $tongtien = $request['tongtien'];
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $tongtien;
        $orderId = time() ."";
        $redirectUrl = "http://127.0.0.1:8000/thanhtoan";
        $ipnUrl = "http://127.0.0.1:8000/thanhtoan";
        $extraData = "";


        

            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
            
        // dd($result);
        return redirect()->to($jsonResult['payUrl']);
    }
    public function print_order($id_sp){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id_sp));
        return $pdf->stream();
    }
    public function print_order_convert($id_sp){
        return $id_sp;
    }
}