<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Couriers;
use App\Order;

class CourierController extends Controller
{
    public function setCourier(Request $request,$id)
    {
    	//dd($request);
    	//dd($id);
    	$data_order = Order::find($id);
    	$data_order->courier_id = $request->courier;
    	$data_order->waktu_jemput = date('Y-m-d',strtotime($request->tgl_jemput));
    	$data_order->status = "JEMPUT";
    	$data_order->save();

    	$cour = Couriers::find($data_order->courier_id);
    	$cour->max_order -= 1;
    	$cour->save();

    	return route('order');
    }
}
