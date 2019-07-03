<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\CustomerAddress;
use App\DepoModel;
use App\Couriers;
use Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approval()
    {   
        //dd($dataOffice);
        $idOffice = Auth::guard('operator')->user()->first()->office_id;
        //dd($idOffice);
        $dataCour = Couriers::where('office_id',$idOffice)
        ->where('status','off')
        ->where('max_order','!=',0)
        ->get();
        $orders = Order::paginate(15);
        
        
        return view('admin/order/aproval', compact('orders','dataCour'));
    }

    public function indexCostumer()
    {
        return view('/customer-views/index');
    }
   

    public function show_order()
    {
        $orderAdd = Order::where('customer_id', 1)->get();
        $add = collect([]);
        foreach ($orderAdd as $key => $value) {
            $add->push($value->address_receiver);
        }
        $cusAdd = CustomerAddress::where('customer_id', 1)->get();
        $add2 = collect([]);
        foreach ($cusAdd as $key => $value) {
            $add->push($value->address_receiver);
        }

        return view('order', ['adds' => $add->unique(), 'add2s' => $add2->unique()]);
    }

   public function update(Request $request, $id)
   {
                 
    if(!$orders = Order::find($id))
    {
        echo "error";
        return redirect('order');
    }else{
        $user = Customer::find($request->id);

        $orders->update([
            'status' => "PENDING"
        ]);
        // $url = "https://fcm.googleapis.com/fcm/send";
                    
        // $val= $user['registeredDeviceId'];
        // $message = array("title" => "PT.POS Indonesia","body" => "Pesanan Anda akan di Pickup Oleh kurir, Dalam Estimasi waktu 78 jam","content" => "Pesanan Anda akan di Pickup Oleh kurir, Dalam Estimasi waktu 78 jam","click_action" => "LogOrderActivity","click_action" => "FCM_PLUGIN_ACTIVITY");
        // $message2 = array("title" => "PT.POS Indonesia","body" => "Mohon Untuk Menunggu");
        // $fields = array(
        //     "to"  				=> $val,
        //     "notification"      => $message
        // );

        // $auth_key = "AIzaSyBaibeWWwTmPCIBnTZQFzty6TPeG-6mNaY";
        // $headers = array(
        //     "Authorization: key=".$auth_key,"Content-Type: application/json"
        //     );

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // $result = curl_exec($ch);
        // echo $result;
        // echo json_encode($fields);
        
        //c176Xy_HlK8:APA91bE0zuju0jw8plxNZTXt9-iezaHYZyjcN-U-RuuM0FWGRmhcc3fjUg739jXbTBUMaWAjYk4nTvpqiDILQBSO_t791TJo7934BK7Ih1NyHkm7w5JlJmUeabHF5F1tGCnHwK5at9OY
        return redirect('order');
    }  
        
   }
    


    public function order_history() {
        $orders = Order::paginate(15);
        return view('admin/order/history', compact('orders'));
    }

    public function order_store(Request $request) {
        
        $total = collect([]);
        foreach ($request->barang as $key => $value) {
            $order = new Order;
            $order->customer_id = Auth::user()->id;
            $order->name_order = $request->barang[$key];
            $order->category = $request->kategori[$key];
            $order->weight = $request->berat[$key];
            $order->quantity = $request->jumlah[$key];
            $order->status = 'off';
            $order->name_receiver = $request->namaPenerima[$key];
            $order->address_receiver = $request->alamat[$key];
            $order->total_bayar = $request->berat[$key]*1000;
            $total->push($order->total_bayar);
            $order->save();
        }

            //dd(Auth::user()->tagihanCustomer()->first());

            $data_tagihan = Auth::user()->tagihanCustomer()->first();

            if (is_null($data_tagihan) || !is_null($data_tagihan->tgl_lunas)) {
                $depo = new DepoModel;
                $tagihan = $total->sum();
            } else {
                $depo = DepoModel::where('customer_id',Auth::user()->id)->first();
                $tagihan = $depo->tagihan + $total->sum();
            }
            $this->addTagihan($data_tagihan,$tagihan);
            
            // $depo->customer_id = Auth::user()->id;
            // $depo->bukti_bayar = NULL;
            // $depo->tanggal_lunas = NULL;
            // $depo->tagihan = $tagihan;
            // $depo->save();
            
            // $customer = $depo->CustomerToDepo()->first();
            // $customer_saldo = $customer->saldo;
            // $saldo_now = $customer_saldo - $total->sum();
            // $customer->saldo = $saldo_now;
            // $customer->save();
        

        return redirect()->back();
    }

    public function addTagihan($param,$tagihan)
    {
            $param->customer_id = Auth::user()->id;
            $param->bukti_bayar = NULL;
            $param->tanggal_lunas = NULL;
            $param->tagihan = $tagihan;
            $param->nominal = 0;
            $param->save();

            $customer = $param->CustomerToDepo()->first();
            $customer_saldo = $customer->saldo;
            $saldo_now = $customer_saldo - $total->sum();
            $customer->saldo = $saldo_now;
            $customer->save();
    }

}
