<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThanhvienController extends Controller
{
    public function __construct() {
        $loaisp = \DB::table('loai')->where('anhien','=',1 )->orderBy('thutu')->get();
        \View::share( 'loaisp', $loaisp );
    }
    function dangnhap(){ 
        return view('dangnhap'); 
    }
    function dangnhap_(Request $request){
        if(auth()->guard('web')
        ->attempt(['email'=>$request['email'],'password'=>$request['matkhau']])){
        $user = auth()->guard('web')->user();
        return redirect()->intended('/');
        }
        else return back()->with('thongbao','Email, Password không đúng');
    }
    function thoat(){
        auth()->guard('web')->logout();
        return redirect('/dangnhap')->with('thongbao','Bạn đã thoát thành công');
    }
    function dangky(){ return view('dangky'); }
    function dangky_(){}
}
