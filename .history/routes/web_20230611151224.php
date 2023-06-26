<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


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
Use App\Http\Controllers\LienHeController;
Use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
Route::get('/', [SanPhamController::class,'index']);
Route::get('/sp/{id}', [SanPhamController::class,'chitiet']);
Route::get('/loai/{id}', [SanPhamController::class,'sptrongloai']);
Route::get('/timkiem/{tukhoa}', [SanPhamController::class,'timkiem']);
Route::get('/lienhe',[LienHeController::class,'index']);
Route::get('/cart',[CartController::class,'index']);
// Route::get('/sanpham',[SanPhamController::class,'sanphams']);
Route::get("/sanpham",[SanPhamController::class,'sanphams'], function(Request $request){ 
    $tukhoa = ($request->has('tukhoa'))? $request->query('tukhoa'):"";
    $tukhoa = trim(strip_tags($tukhoa));
    $listsp=[];
    if ($tukhoa!=""){
        $listsp = DB::table("sanpham")->where("tensp", "like", "%$tukhoa%")->get();
    }
    return view('sanpham', ['tukhoa'=> $tukhoa , 'listsp'=>$listsp]);
});