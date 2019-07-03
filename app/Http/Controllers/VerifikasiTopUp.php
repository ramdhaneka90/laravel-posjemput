<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepoModel;
use App\Customer;
use Carbon\Carbon;
use Auth;

class VerifikasiTopUp extends Controller
{
    public function verifIndex()
    {
    	$customers_pay_data = \DB::table('customers')
            ->rightJoin('deposit', 'customers.id', '=', 'deposit.customer_id')
            ->select('customers.name','deposit.*')
            ->where([
            	['deposit.bukti_bayar','!=',null],
            	['deposit.tanggal_lunas',null]
            ])
            ->get();
    	return view('/admin/verif-topup',['data'=>$customers_pay_data]);
    }

    public function verifikasiBayar(DepoModel $id)
    {
    	$data_customer = Customer::find($id->customer_id);
    	//dd($data_customer);
    	$nominalBayar = $id->nominal;
    	$kembalian = $nominalBayar-$id->tagihan;
    	$id->tanggal_lunas = Carbon::now();
    	$id->save();

    	$this->updateSaldo($data_customer,$kembalian);


    	return redirect()->back()->with(['status','Pembayaran Di Verifikasi']);
    }

    public function updateSaldo($dataCustomer,$kembalian)
    {
    	$saldo = $dataCustomer->saldo;
    	$saldoAfterTopUp = $saldo + $kembalian;
    	$dataCustomer->saldo = $saldoAfterTopUp;
    	$dataCustomer->save();
    }
}
