<?php
namespace App\Http\Controllers;

use App\Models\Binhluan;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Http\Request;
class SanphamController extends Controller
{
    function index(){
        $spnoibat = \DB::table('sanpham')->where('hot', 1)->orderBy('ngay', 'desc')->limit(8)->get();
        $sphot = \DB::table('sanpham')->where('hot', 1)->orderBy('soluotxem', 'desc')->limit(1)->get();
        $spxemnhieu = \DB::table('sanpham')->orderBy('soluotxem', 'desc')->limit(8)->get();
        return view('home', [
            'spnoibat' => $spnoibat,
            'sphot' => $sphot,
            'spxemnhieu' => $spxemnhieu,
        ]);
    }
    function sanphams(Request $request){
        $perpage = 12;
        $sanphams = \DB::table('sanpham')->get();
        $loai = \DB::table('loai')->get();
        
        $tukhoa = $request->has('tukhoa') ? $request->query('tukhoa') : "";
        $tukhoa = trim(strip_tags($tukhoa));
        
        $listsp = \DB::table("sanpham")
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
        $sp = \DB::table('sanpham')->where ('id_sp','=', $id)->first();   
        $idsp = $sp->id_sp;
        $tc = $sp->tinhchat;
        $idloai = $sp->id_loai;     
        $splienquan = \DB::table('sanpham')->
        where ('id_loai', $idloai)->
        where('tinhchat', $tc)->
        orderBy('ngay','desc')->
        limit(3)->get()->except($idsp);  
        $ct = \DB::table('sanphamchitiet')->where ('id_sp','=', $id)->get();
        $bl = \DB::table('binhluan')->where('id_sp','=', $id)->get();
        return view ('chitietsp', ['id'=>$id, 'title'=>$sp->ten_sp, 'sp'=>$sp, 'splienquan'=>$splienquan, 'ct'=>$ct, 'bl'=>$bl] );
    }
    function sptrongloai($idloai=0){
        $perpage= 12;
        $loai = \DB::table('loai')->get();
        $listsp = \DB::table('sanpham')
        ->where ('id_loai', $idloai)
        ->paginate($perpage)->withQueryString();
        $tenloai = \DB::table('loai')->where ('id_loai', $idloai)->value('ten_loai');
        return view ('sptrongloai', ['loai'=>$loai,'id'=>$idloai, 'title'=>$tenloai , 'listsp'=>$listsp]);   
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
}