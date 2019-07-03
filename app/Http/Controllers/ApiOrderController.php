<?php

namespace App\Http\Controllers;


use Auth;
use App\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Transformers\OrderTransformers;
use App\Http\Resources\OrderResource;

class ApiOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return fractal()
            ->collection($orders)
            ->transformWith(new OrderTransformers)
            ->toArray();
    }

    public function show($id)
    {
        $orders = Order::find($id);

        return fractal()
        ->item($orders)
        ->transformWith(new OrderTransformers)
        ->toArray();
    }

    public function store(Request $request)
    {
        $this->validate($request, Order::rules(false));
    
        if (!Order::create($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 200,
            ];
        }
    }
    public function update(Request $request, $id)
    {
        $Order = Order::find($id);
        if ($Order) {
          $Order->update($request->all());
          return response()->json(['status' => 'success', 'message' => 'Data has been updated']);
        }
 
        return response()->json(['status' => 'error', 'message' => 'Cannot updating data'],400);
    }
   

    public function destroy($id)
    {
      $Order = Order::find($id);
      if ($Order) {
        $Order->delete();
        return response()->json(['stats' => 'success', 'message' => 'Data has been deleted']);
      }
 
      return response()->json(['status' => 'error', 'message' => 'Cannot deleting data'],400);
    }

  
}
