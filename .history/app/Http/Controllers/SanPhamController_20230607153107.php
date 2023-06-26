<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class SanphamController extends Controller
{
    function index(){
        $spnoibat = \DB::table('sanpham')->where('hot',1 ) -> orderBy('ngay', 'desc')->limit(8)->get();
        $spxemnhieu = \DB::table('sanpham')->where('soluotxem','desc')->limit(8)->get();
        return view ('home' , ['spnoibat' =>$spnoibat], ['spxemnhieu'=>$spxemnhieu]);
    }
    function chitiet($id=0){
        
        return view ('chitiet', ['id'=>$id]);
    }
    function sptrongloai($idloai=0){
        return view ('sptrongloai', ['id'=>$idloai]);
    }
    
}