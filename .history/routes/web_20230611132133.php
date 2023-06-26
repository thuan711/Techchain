<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Use App\Http\Controllers\SanPhamController;
Use App\Http\Controllers\LienHeController;
use Illuminate\Http\Request;
Route::get('/', [SanPhamController::class,'index']);
Route::get('/sp/{id}', [SanPhamController::class,'chitiet']);
Route::get('/loai/{id}', [SanPhamController::class,'sptrongloai']);
Route::get('/timkiem/{tukhoa}', [SanPhamController::class,'timkiem']);
Route::get('/lienhe',[LienHeController::class,'index']);
Route::get('/sanpham',[SanPhamController::class,'sanphams']);
Route::get("/timkiem", function(Request $request){ 
  $tukhoa = ($request->has('tukhoa'))? $request->query('tukhoa'):"";
  $tukhoa = trim(strip_tags($tukhoa));
  $listsp=[];
  if ($tukhoa!=""){
    $listsp = DB::table("sanpham")->where("tensp", "like", "%$tukhoa%")->get();
  }
  return view('timkiem', ['tukhoa'=> $tukhoa , 'listsp'=>$listsp]);
});
