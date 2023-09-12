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
    function dangnhap_(){}
}
