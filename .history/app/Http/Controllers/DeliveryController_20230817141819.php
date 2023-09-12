<?php

namespace App\Http\Controllers;
use App\Models\Thanhpho;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $city = Thanhpho::orderBy('matp','ASC')->get();
        return view('admin.delivery.adddelivery')->with(compact('city'));
    }
}
