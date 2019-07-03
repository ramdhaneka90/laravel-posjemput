<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepoModel;
use App\Order;
use App\Customer;
use Carbon\Carbon;
use Auth;

class TopUpController extends Controller
{

	public function topUpindex()
	{
		$data_order_customer = Auth::user()->orders()->get();
		//dd($data_order_customer);
		$bulan_collect = collect([]);
		foreach ($data_order_customer as $key => $value) {
			$month = Carbon::parse($data_order_customer[$key]->created_at);
			$bulan_collect->push($month->isoFormat('MMMM'));
		}
		//dd($tes->isoFormat('MMMM'));
		//dd($bulan_collect->unique());
		//dd($orderan);
		$depoData = Auth::user()->tagihanCustomer()->first();
		if (is_null($depoData)) {
			$tagihan = null;
			$tgl_lunas = null;
			$bulan_collect = null;
		} else {

			$tagihan = $depoData->tagihan;
			$tgl_lunas = $depoData->tanggal_lunas;
			$bukti_bayar = $depoData->bukti_bayar;
		}

		return view('/customer-views/order-topup',compact('tagihan','bulan_collect','tgl_lunas','bukti_bayar'));		
	}

    public function topUp(Request $request)
    {

    	$depoData = Auth::user()->tagihanCustomer()->first();
    	$fileBayar = $request->file('buktiBayar');
    	$name = 'bukti-topup'.Carbon::now().'.'.$fileBayar->getClientOriginalExtension();
    	$fileBayar->move(public_path('img/bukti-topup'),$name);
    	$depoData->bukti_bayar = $name;
    	$depoData->nominal = $request->nominal;
    	$depoData->tanggal_lunas = NULL;

    	$depoData->save();

    	return route('topUpCustomer');
    }
}
