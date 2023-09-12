<?php

namespace App\Http\Controllers;
use App\Models\Thanhpho;
use App\Models\Xaphuong;
use App\Models\Quanhuyen;
use App\Models\Feeship;
use FFI;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $city = Thanhpho::orderBy('matp','ASC')->get();
        return view('admin.delivery.adddelivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
        $data = $request->all();
       
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
            return response()->json($output);
        }
    }
    public function select_feeship(Request $request){
        $feeship = Feeship::order_by('fee_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên thành phố</th>
                                    <th>Tên quận huyện</th>
                                    <th>Tên xã phường</th>
                                </tr>
                            </thead>
                            <tbody>
                            ';
                            foreach ($feeship as $key => $fee){
                                $output.='
                                    <tr>
                                    <td>'.$fee->thanhpho->name_city.'</td>
                                    <td>'.$fee->quanhuyen->name_quanhuyen.'</td>
                                    <td>'.$fee->xaphuong->name_xaphuong.'</td>
                                    <td contenteditable data-feeship_id="'.$fee->fee_id.'">'.number_format($fee->feeship,0,',','.').'</td>
                                    </tr>
                                ';
                            }
                            $output.='
                            </tbody>
                        </table>
                    </div>';
                    echo $output;
                    return response()->json($output);
    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_ship = $data['fee_ship'];
        $fee_ship->save();
    }
    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'], '.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }
}
