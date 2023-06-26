<?php
namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Http\Request;
class SanphamController extends Controller
{
    function index(){
        $spnoibat = \DB::table('sanpham')->where('hot',1 ) -> orderBy('ngay', 'desc')->limit(8)->get();
        $spxemnhieu1 = \DB::table('sanpham')->orderBy('soluotxem','desc')->limit(8)->get();
        $sphot = \DB::table('sanpham')->where('hot',1)->limit(1)->get();
        return view ('home' , ['spnoibat' =>$spnoibat], ['spxemnhieu'=>$spxemnhieu1], ['sphot'=>$sphot] );
    }
    function chitiet($id=0){
        $sp = \DB::table('sanpham')->where ('id_sp','=', $id)->first();   
        $idsp = $sp->id_sp;
        $tc = $sp->tinhchat;
        $idloai = $sp->id_loai;     
        $splienquan = \DB::table('sanpham')->
        where ('id_loai', $idloai)->
        where('tinhchat', $tc)->
        orderBy('ngay','desc')->
        limit(3)->get()->except($idsp);  
        return view ('chitietsp', ['id'=>$id, 'title'=>$sp->ten_sp, 'sp'=>$sp, 'splienquan'=>$splienquan] );
    }
    function sptrongloai($idloai=0){
        $perpage= 12;
        $listsp = \DB::table('sanpham')
        ->where ('id_loai', $idloai)
        ->paginate($perpage)->withQueryString();
        $tenloai = \DB::table('loai')->where ('id_loai', $idloai)->value('ten_loai');
        return view ('sptrongloai', ['id'=>$idloai, 'title'=>$tenloai , 'listsp'=>$listsp]);   
    }
    
}