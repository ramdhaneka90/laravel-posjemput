<?php
namespace App\Transformers;
use App\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformers extends TransformerAbstract
{
    public function transform(Order $orders)
    {
        return [
            'id'  => $orders->id,
            'customer_id' => $orders->customer_id,
            'name_order' => $orders->name_order,
            'category' => $orders->category ,
            'weight' => $orders->weight ,
            'status' => $orders->status ,
            'quantity' => $orders->quantity ,
            'name_receiver' => $orders->name_receiver ,
            'address_receiver' => $orders->address_receiver
        ];
    }
}
