<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\SanPhamController;
Use App\Http\Controllers\CartController;
use App\Http\Controllers\LoaispController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChitietspController;
use App\Http\Controllers\DonhangController;
use App\Http\Controllers\BinhluanController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', [SanPhamController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

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
// Route::resource('admin/loaisp',LoaispController::class);
// Route::resource('admin/sanpham', ProductController::class);
// Route::resource('admin/chitietsp',ChitietspController::class);
// Route::resource('admin/donhang',DonhangController::class);
// Route::resource('admin/binhluan',BinhluanController::class);
// Route::resource('admin/thanhvien',UserController::class);
// Route::get("/thoat", function(){
//     Auth::logout();
//     return redirect("/");
// });

Route::get('/themvaogio/{idsp}/{soluong}', [SanPhamController::class,'themvaogio']);
Route::get('/hiengiohang', [SanPhamController::class,'hiengiohang']);
Route::get('/xoasptronggio/{idsp}', [SanPhamController::class,'xoasptronggio']);
    


Route::group(['prefix' => 'admin'], function() {
    
});

Route::get('/chenuser', function(){
    DB::table('users')->insert([
        'ho' => 'Đỗ Đạt','ten' => 'Cao', 'password' => bcrypt('hehe') , 'diachi'=>'',
        'email' => 'dodatcao@gmail.com','dienthoai' => '0918765238',
        'hinh' => '','vaitro' => 1 ,'trangthai' => 0
    ]);
    DB::table('users')->insert([
        'ho' => 'Mai Anh','ten' => 'Tới', 'password' => bcrypt('hehe') ,'diachi'=>'',
        'email' => 'maianhtoi@gmail.com','dienthoai' => '098532482',
        'hinh' => '','vaitro' => 0 ,'trangthai' => 0]);
    DB::table('users')->insert([
        'ho' => 'Đào Kho','ten' => 'Báu', 'password' => bcrypt('hehe') ,'diachi'=>'',
        'email' => 'daokhobau@gmail.com','dienthoai' => '097397392',
        'hinh' => '','vaitro' => 1 ,'trangthai' => 1
    ]);
});

Route::group(['prefix' => 'admin'], function() {   
    
    Route::get('dangnhap', [AdminController::class,'dangnhap']);
    Route::post('dangnhap', [AdminController::class,'dangnhap_']);
    Route::get('thoat', [AdminController::class, 'thoat']);
});

Route::group(['prefix' => 'admin' ,'middleware' => 'adminauth'], function() {
    Route::get('/', [AdminController::class,'index']);
    Route::resource('loaisp', LoaispController::class);
    Route::resource('sanpham',ProductController::class);
    Route::resource('chitietsp',ChitietspController::class);
    //routing quản lý loại sản phẩm
    //routing quản lý sản phẩm
    //routing quản lý bình luận 
});

Route::get('/dangnhap',[App\Http\Controllers\ThanhvienController::class,'dangnhap'])->name('login');
Route::post('/dangnhap', [App\Http\Controllers\ThanhvienController::class,'dangnhap_']);
Route::get('/thoat', [App\Http\Controllers\ThanhvienController::class,'thoat']);