<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('sanpham', function(Request $request){    
    //Trả về chi tiết 1 sản phẩm theo tham số id
    if( ! $request->has('id_sp')) $id_sp = 0; 
    else {
        $id_sp = (int) $request->query('id_sp');
        $query = DB::table('sanpham')->select('id_sp', 'ten_sp', 'gia', 'giakm', 'anhien', 'tinhchat', 'soluotxem', 'hot', 'hinh', 'ngay', 'id_loai');
        $kq = $query->where("id","=", $id_sp) ->first();        
        return response()->json($kq, 200);
    }
    //code trả về chi tiết 1 sản phẩm

    //Trả về ds sản phẩm theo tham số: idLoai, _order, _sort, _limit 
    //Code trả về danh sách sản phẩm
});
