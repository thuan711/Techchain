<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        return view('admin.delivery.adddelivery');
    }
}
