<?php

namespace App\Http\Controllers;
use App\Models\Donhang;
use App\Models\Chitietdonhang;
use App\Models\Sanpham;
use Illuminate\Http\Request;

class ChitietdonhangController extends Controller
{
    public function hienThiChiTietDonHang($id_dh)
{
    // Lấy thông tin đơn hàng chính từ bảng donhang
    $donhang = Donhang::findOrFail($id_dh);

    // Lấy thông tin chi tiết đơn hàng từ bảng chitietdonhang và liên kết với bảng sanpham
    $chitietdonhang = Chitietdonhang::where('id_dh', $id_dh)
        ->join('sanpham', 'chitietdonhang.id_sp', '=', 'sanpham.id_sp')
        ->select('chitietdonhang.*', 'sanpham.ten_sp', 'sanpham.gia')
        ->get();

    // Trả về view để hiển thị thông tin đơn hàng chi tiết
    return view('chitietdonhang', ['donhang' => $donhang, 'chitietdonhang' => $chitietdonhang]);
}
}
