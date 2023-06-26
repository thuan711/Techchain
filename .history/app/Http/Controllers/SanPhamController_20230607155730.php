<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class SanphamController extends Controller
{
    function index(){
        $spnoibat = \DB::table('sanpham')->where('hot',1 ) -> orderBy('ngay', 'desc')->limit(8)->get();
        $spxemnhieu = \DB::table('sanpham')->orderBy('soluotxem','desc')->limit(8)->get();
        return view ('home' , ['spnoibat' =>$spnoibat], ['spxemnhieu'=>$spxemnhieu]);
    }
    function chitiet($id=0){
        $sp = \DB::table('sanpham')->where ('id_sp','=', $id)->first();   
        $idsp = $sp->id_sp;
        $tc = $sp->tinhchat;
        $idloai = $sp->id_loai;     
        $splienquan = \DB::table('sanpham')->where ('id_loai', $idloai)->where('tinhchat', $tc)->orderBy('ngay','desc')->limit(4)->get()->except($idsp);  
        return view ('chitiet', ['id'=>$id, 'title'=>$sp->ten_sp, 'sp'=>$sp, 'splienquan'=>$splienquan] );
    }
    function sptrongloai($idloai=0){
        return view ('sptrongloai', ['id'=>$idloai]);
    }
    
}