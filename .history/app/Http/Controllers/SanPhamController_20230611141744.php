<?php
namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Http\Request;
class SanphamController extends Controller
{
    function index(){
        $spnoibat = \DB::table('sanpham')->where('hot', 1)->orderBy('ngay', 'desc')->limit(8)->get();
        $sphot = \DB::table('sanpham')->where('hot', 1)->orderBy('soluotxem', 'desc')->limit(1)->get();
        $spxemnhieu = \DB::table('sanpham')->orderBy('soluotxem', 'desc')->limit(8)->get();
        return view('home', [
            'spnoibat' => $spnoibat,
            'sphot' => $sphot,
            'spxemnhieu' => $spxemnhieu,
        ]);
    }
    function sanphams(){
        $perpage= 12;
        $listsp = \DB::table('sanpham')
        ->paginate($perpage)->withQueryString();
        $sanphams = \DB::table('sanpham')->get();
        $loai = \DB::table('loai')->get();
        return view('sanpham', [
            'spall'=>$sanphams,'listsp'=>$listsp,'loai'=>$loai
        ]);
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
        $loai = \DB::table('loai')->get();
        $listsp = \DB::table('sanpham')
        ->where ('id_loai', $idloai)
        ->paginate($perpage)->withQueryString();
        $tenloai = \DB::table('loai')->where ('id_loai', $idloai)->value('ten_loai');
        return view ('sptrongloai', ['loai'=>$loai,'id'=>$idloai, 'title'=>$tenloai , 'listsp'=>$listsp]);   
    }
    
}