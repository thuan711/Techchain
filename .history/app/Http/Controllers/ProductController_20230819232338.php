<?php

namespace App\Http\Controllers;
use App\Http\Requests\RuleNhapSanpham;
use App\Models\Chitietsp;
use App\Models\Loaisp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Session;
Paginator::useBootstrap();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     $this->middleware('permission:admin | publish product|edit product|add product|delete product',['only'=>['index','show']]);
    //     $this->middleware('permission:add product',['only'=>['create','store']]);
    //     $this->middleware('permission:edit product',['only'=>['edit','update']]);
    //     $this->middleware('permission:delete product',['only'=>['destroy']]);
    // }
    public function index()
    {
        $perPage = 5;
        $listsp=\App\Models\Sanpham::orderBy('id_sp','desc')->paginate($perPage );
        return view("admin.sanpham", ['listsanpham'=>$listsp] );
    }
    public function ten_loai($id_loai)
    {
        $loai = Loaisp::find($id_loai);

        if ($loai) {
            return $loai->ten_loai;
        }

        return 'Loại không tồn tại';
    }
    public function RAM($id_ct)
    {
        $ct = Chitietsp::find($id_ct);

        if ($ct) {
            return $ct->RAM;

        }

        return 'Chi tiết không tồn tại';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.sanpham_them");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleNhapSanpham $request)
    {
        $arr = $request->post();
        $tensp = ($request->has('tensp'))? $arr['tensp']:"";
        $gia = ($request->has('gia'))? (int) $arr['gia']:0;
        $gia_km = ($request->has('gia_km'))? (int) $arr['gia_km']:0;
        $hinh = ($request->has('hinh'))? $arr['hinh']:"";
        $ngay = ($request->has('ngay'))? $arr['ngay']:"";
        $id_loai = ($request->has('id_loai'))? (int)$arr['id_loai']:"";
        $hot = ($request->has('hot'))? (int)$arr['hot']:0;
       
        $tensp = trim(strip_tags($tensp));
        $hinh = trim(strip_tags($hinh));

        $sp = new \App\Models\Sanpham;
        $sp->ten_sp = $tensp;
        $sp->gia = $gia;
        $sp->gia_km = $gia_km;
        $sp->hinh = $hinh;
        $sp->ngay = $ngay;
        $sp->hot= $hot;
       
        $sp->id_loai = $id_loai;
        $sp->save();
        Session::flash('statusAlert','success');
        return redirect('/admin/sanpham')->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id_sp=0)
    {
        $sp = \App\Models\Sanpham::find($id_sp);
        if ($sp==null) {
            $request->session()->flash('thongbao', "Sản phẩm $id_sp không có");
            return redirect("/thongbao");
        }
        return view("admin.sanpham_edit", ['sp'=>$sp] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuleNhapSanPham $request, $id_sp) { 
        $arr = $request->post();
        $ten_sp = ($request->has('ten_sp'))? $arr['ten_sp']:"";
        $gia = ($request->has('gia'))? (int) $arr['gia']:0;
        $gia_km = ($request->has('gia_km'))? (int) $arr['gia_km']:0;
        $hinh = ($request->has('hinh'))? $arr['hinh']:"";
        $ngay = ($request->has('ngay'))? $arr['ngay']:"";
        $id_loai = ($request->has('id_loai'))? (int)$arr['id_loai']:"";
        $hot = ($request->has('hot'))? (int)$arr['hot']:0;
        $ten_sp = trim(strip_tags($ten_sp));
        $hinh = trim(strip_tags($hinh));
        
        $sp = \App\Models\Sanpham::find($id_sp);
        if ($sp==null) {
            $request->session()->flash('thongbao', "Sản phẩm $id_sp không tồn tại");
            redirect("/thongbao");
        }
        $sp->ten_sp = $ten_sp;
        $sp->gia = $gia;
        $sp->gia_km= $gia_km;
        $sp->hinh = $hinh;
        $sp->ngay = $ngay;
        $sp->hot= $hot;
        $sp->id_loai = $id_loai;
        $sp->save();
        return redirect('/admin/sanpham');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sp = \App\Models\Sanpham::find($id);
        if ($sp==null) {
            $request->session()->flash('thongbao', "Sản phẩm $id không tồn tại");
            redirect("/thongbao");
        }
        $sp->delete();
        return redirect('/admin/sanpham');
    
    }
    
}
