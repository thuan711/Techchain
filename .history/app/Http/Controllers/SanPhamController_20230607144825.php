<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    function index(){
        $spnoibat = \DB::table('sanpham)')->where('hot',1)->orderBy('ngay','desc')->limit(3)->get();
        return view ('home',['spnoibat'=>$spnoibat]);
    }
    function chitiet($id=0){
        return view ('chitiet', ['id'=>$id]);
    }
    function sptrongloai($idloai=0){
        return view ('sptrongloai', ['id'=>$idloai]);
    }

}
