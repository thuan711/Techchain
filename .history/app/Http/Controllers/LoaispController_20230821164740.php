<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use \App\Http\Requests\RuleNhapLoaisp;
class LoaispController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 5;
        $loaisp = \App\Models\Loaisp::paginate($perPage);
        return view("admin.loaisp", ['loaisp'=>$loaisp] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() { 
        return view("admin.loaisp_them");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleNhapLoaisp $request)
    {
        $arr = $request->post();
        $ten_loai = ($request->has('ten_loai')) ? $arr['ten_loai'] : "";
        $slug = ($request->has('slug')) ? $arr['slug'] : "";
        $thutu = ($request->has('thutu')) ? $arr['thutu'] : "";
        $anhien = (int) $request['anhien'];
        $ten_loai = trim(strip_tags($ten_loai));
        $thutu = (int) $thutu;
        $loai = new \App\Models\Loaisp;
        $loai->ten_loai = $ten_loai;
        $loai->slug = $slug;
        $loai->thutu = $thutu;
        $loai->thutu = $anhien;
        $loai->save();
        return redirect('/admin/loaisp');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_loai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id_loai=0){ 
        $loaisp = \App\Models\Loaisp::find($id_loai);
        if ($loaisp==null) {
            $request->session()->flash('thongbao', "Loại sp $id_loai không có");
            return redirect("/thongbao");
        }
        return view("admin.loaisp_edit", ['loaisp'=>$loaisp] );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_loai)
    {
        $arr = $request->post();
        $ten_loai = ($request->has('ten_loai'))? $arr['ten_loai']:"";
        // $soSP = ($request->has('soSP'))? $arr['soSP']:"";
        $ten_loai = trim(strip_tags($ten_loai));
        $slug = trim(strip_tags($slug));
        // $soSP = (int) $soSP;
        $loai = \App\Models\Loaisp::find($id_loai);
        if ($loai == null) {
            $request->session()->flash('thongbao', "Loại sản phẩm $id_loai không tồn tại");
            redirect("/thongbao");
        }
        $loai->ten_loai = $ten_loai;
        $loai->slug = $slug;
        // $loai->soSP = $soSP;
        $loai->save();
        return redirect('/admin/loaisp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $sosp = \DB::table('sanpham')->where('id_loai', $id)->count();
        if ($sosp>0) {
            $request->session()->flash('thongbao','Không xóa, vì có sản phẩm trong loại');
            return redirect('/admin/loaisp');
        }
        \DB::table('loai')->where('id_loai', $id)->delete();
        $request->session()->flash('thongbao', 'Đã xóa loại');
        return redirect('/admin/loaisp');
    }
}
