<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    function index(){
        return view ('home');
    }
    function chitiet($id=0){
        return view ('chitiet', ['id'=>$id]);
    }
    function sptrongloai($idloai=0){
        return view ('sptrongloai', ['id'=>$idloai]);
    }
}
