<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Customer;
use App\CustomerAddress;
use App\Helpers\baseCURL;
use RajaOngkir;
use Auth;

class CustomerController extends Controller
{
    public function indexCostumer(){
    	//$data = RajaOngkir::getProvince(2);

        return view('/customer-views/index');
    }

    public function getCity($id)
    {
    	$url = "city?province=".$id;
    	$citiesProvince = baseCURL::instance()->OngkirCURL($url);
    	//dd($citiesProvince);
    	//$provinsi = baseCURL::instance()->OngkirCURL($url);
    	// foreach ($citiesProvince as $key => $value) {
    	// 	array_push($a, $value);
    	// }
    	//$b = Cache::get('province');
    	//dd(json_encode($provinsi));
    	// dd($citiesProvince[27]->postalCode);
    	return response()->json(['kota'=>$citiesProvince]);

    }

    public function CustomerOrder()
    {
    	$url = "province";
    	$provinsi = baseCURL::instance()->OngkirCURL($url);
    	//$provinceData = json_encode($provinsi);
    	//$provinceData = "a";
    	$provinceData = $provinsi['results'];
    	$orderAdd = Auth::user()->orders()->get();
        $add = collect([]);
        foreach ($orderAdd as $key => $value) {
            $add->push($value->address_receiver);
        }

    	$cusAdd = Auth::user()->customerAddress()->get();
        $add2 = collect([]);
        foreach ($cusAdd as $key => $value) {
            $add2->push($value);
        }
        //dd($provinceData);

        return view('/customer-views/order-pickup',['add'=>$add->unique(),'add2'=>$add2->unique(),'provinsi'=>$provinceData]);
    }
}
