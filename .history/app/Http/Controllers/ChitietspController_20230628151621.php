<?php

namespace App\Http\Controllers;
use App\Models\Sanpham;
use Illuminate\Http\Request;

class ChitietspController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.chitietsp");
    }
    public function ten_sp($id_sp)
    {
        $sp = Sanpham::find($id_sp);
        if ($sp) {
            return $sp->ten_sp;
        }
        return 'Sản phẩm không tồn tại';
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.chitietsp_them");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arr = $request->post();
        $RAM = ($request->has('RAM'))? $arr['RAM']:"";
        $CPU = ($request->has('CPU'))? $arr['CPU']:"";
        $Dia = ($request->has('Dia'))? $arr['Dia']:"";
        $Mausac = ($request->has('Mausac'))? $arr['Mausac']:"";
        $Cannang = ($request->has('Cannang'))? $arr['Cannang']:"";
        $mota = ($request->has('mota'))? $arr['mota']:"";
       

        $ct = new \App\Models\Chitietsp;
        $ct->RAM = $RAM;
        $ct->CPU = $CPU;
        $ct->Dia= $Dia;
        $ct->Mausac = $Mausac;
        $ct->Cannang = $Cannang;
        $ct->mota = $mota;
        
        $ct->save();
        return redirect('/admin/sanpham');
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
    public function edit(Request $request,$id_ct=0)
    {
        $ct = \App\Models\Chitietsp::find($id_ct);
        if ($ct==null) {
            $request->session()->flash('thongbao', "Sản phẩm $id_ct không có");
            return redirect("/thongbao");
        }
        return view("admin.chitietsp", ['ct'=>$ct] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_ct)
    {
        $arr = $request->post();
        $RAM = ($request->has('RAM'))? $arr['RAM']:"";
        $CPU = ($request->has('CPU'))? $arr['CPU']:"";
        $Dia = ($request->has('Dia'))? $arr['Dia']:"";
        $Mausac = ($request->has('Mausac'))? $arr['Mausac']:"";
        $Cannang = ($request->has('Cannang'))? $arr['Cannang']:"";
        $mota = ($request->has('mota'))? $arr['mota']:"";
        
        
        $ct = \App\Models\Chitietsp::find($id_ct);
        if ($ct==null) {
            $request->session()->flash('thongbao', "Sản phẩm $id_ct không tồn tại");
            redirect("/thongbao");
        }
        $ct->RAM = $RAM;
        $ct->CPU = $CPU;
        $ct->Dia= $Dia;
        $ct->Mausac = $Mausac;
        $ct->Cannang = $Cannang;
        $ct->mota = $mota;
        
        $ct->save();
        return redirect('/admin/sanpham');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
