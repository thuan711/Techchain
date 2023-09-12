<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ThanhToanSuccessEmail;
use App\Http\Requests\RuleThanhToan;
use Illuminate\Support\Facades\Mail;

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
    public function store(RuleThanhToan $request)
    {
        $arr = $request->post();
        $tennguoinhan = ($request->has('tennguoinhan')) ? $arr['tennguoinhan'] : "";
        $email = ($request->has('email')) ? $arr['email'] : "";
        $dienthoai = ($request->has('dienthoai')) ? $arr['dienthoai'] : "";
        $diachigiaohang = ($request->has('diachigiaohang')) ? $arr['diachigiaohang'] : "";
        $tongtien = $request['tongtien'];
        $id_user = Auth::id();
        $dh = new \App\Models\Donhang;
        $dh->tennguoinhan = $tennguoinhan;
        $dh->email = $email;
        $dh->dienthoai = $dienthoai;
        $dh->diachigiaohang = $diachigiaohang;
        $dh->tongtien = $tongtien;
        $dh->id_user = $id_user;
        $dh->save();
        $orderInfo = [
            'tong_tien' => $tongtien,
            'ten_nguoi_nhan' => $tennguoinhan,
            'dia_chi_giao_hang' => $diachigiaohang,
            'dien_thoai' => $dienthoai,
        ];
        Mail::to($email)->send(new ThanhToanSuccessEmail($orderInfo));
        $request->session()->forget('cart');
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
