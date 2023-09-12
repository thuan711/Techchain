<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class DonhangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 5;
        $dh = \App\Models\Donhang::paginate($perPage);
        return view("admin.donhang", ['dh'=>$dh] );
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arr = $request->post();
        $tennguoinhan = ($request->has('tennguoinhan')) ? $arr['tennguoinhan'] : "";
        $dienthoai = ($request->has('dienthoai')) ? $arr['dienthoai'] : "";
        $diachigiaohang = ($request->has('diachigiaohang')) ? $arr['diachigiaohang'] : "";
        $tongtien = (int) $request['tongtien'];
        
        $id_user = Auth::id();
        $dh = new \App\Models\Donhang;
        $dh->tennguoinhan = $tennguoinhan;
        $dh->dienthoai = $dienthoai;
        $dh->diachigiaohang = $diachigiaohang;
        $dh->tongtien = $tongtien;
        $dh->id_user = $id_user;
        $dh->save();
        return redirect('/');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
