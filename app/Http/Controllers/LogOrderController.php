<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogOrder;
use App\Transformers\LogOrderTransformer;


class LogOrderController extends Controller
{
   
    public function show($customerId)
    {
        $logOrders = LogOrder::all();
        $dataLogOrders = array();

        foreach($logOrders as $row) {
            foreach($row->orders as $col) {
                if($col->customer_id == $customerId) {
                    array_push($dataLogOrders, $row);
                }
            }
        }

        return fractal()
            ->collection($dataLogOrders)
            ->transformWith(new LogOrderTransformer)
            ->toArray();
    }

}
