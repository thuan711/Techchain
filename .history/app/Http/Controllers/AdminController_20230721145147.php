<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){ return view("admin/index"); }
    function dangnhap(){ return view("admin/login"); }
    function dangnhap_( Request $request ){}
    function thoat(){ }
}
