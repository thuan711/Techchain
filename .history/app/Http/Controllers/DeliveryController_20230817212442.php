<?php

namespace App\Http\Controllers;
use App\Models\Thanhpho;
use App\Models\Xaphuong;
use App\Models\Quanhuyen;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $city = Thanhpho::orderBy('matp','ASC')->get();
        return view('admin.delivery.adddelivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        var_dump('ád');
        die();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Quanhuyen::where('matp',$data['ma_id'])->orderBy('maqh','ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }
            else{
                $select_wards = Xaphuong::where('maqh', $data['ma_id'])->orderBy('xaid','ASC')->get();
                    $output.= '<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $wards){
                    $output.='<option value="'.$wards->xaid.'">'.$wards->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }
}
