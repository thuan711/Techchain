<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// use Illuminate\Support\Facades\Route;

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
Use App\Http\Controllers\CartController;
use App\Http\Controllers\LoaispController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChitietspController;
use App\Http\Controllers\DonhangController;
use App\Http\Controllers\BinhluanController;
use App\Http\Controllers\UserController;
// Gửi mail liên hệ
use App\Mail\GuiEmail;
Route::post("/guilienhe", function(Illuminate\Http\Request $request){ 
    $arr = request()->post(); 
    $ht = trim(strip_tags( $arr['ht'] ));
    $em = trim(strip_tags( $arr['em'] ));
    $nd = trim(strip_tags( $arr['nd'] ));
    $adminEmail = 'h.thuan7112@gmail.com'; //Gửi thư đến ban quản trị
    Mail::mailer('smtp')->to( $adminEmail )
    ->send( new GuiEmail($ht, $em, $nd) );

    $request->session()->flash('thongbao', "Đã gửi mail");
    return redirect("thongbao"); 
});
Route::get("/thongbao", function(Illuminate\Http\Request $request){ 
    $tb = $request->session()->get('thongbao');
    return view('thongbao',['thongbao'=> $tb]); 
});
//User
Route::get('/', [SanPhamController::class,'index']);
Route::get('/sp/{id}', [SanPhamController::class,'chitiet']);
Route::get('/loai/{id}', [SanPhamController::class,'sptrongloai']);
Route::get('/timkiem/{tukhoa}', [SanPhamController::class,'timkiem']);
Route::get('/lienhe',function () { return view('lienhe');});
Route::get('/cart',[CartController::class,'index']);
Route::get("/sanpham",[SanPhamController::class,'sanphams']);
Route::post('/sp/{id}', 'SanPhamController@store')->name('store');
// ADMIN
Route::get('/admin',function () { return view('admin.admin');});
Route::resource('admin/loaisp',LoaispController::class);
Route::resource('admin/sanpham', ProductController::class);
Route::resource('admin/chitietsp',ChitietspController::class);
Route::resource('admin/donhang',DonhangController::class);
Route::resource('admin/binhluan',BinhluanController::class);
Route::resource('admin/thanhvien',UserController::class);
Route::get("/thoat", function(){
    Auth::logout();
    return redirect("/");
});