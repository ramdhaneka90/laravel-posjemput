<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Order;
        $order->customer_id = 1;
        $order->name_order = 'barang1';
        $order->category = 'Elektronik';
        $order->weight = 1;
        $order->status = 'off';
        $order->quantity = 2;
        $order->name_receiver = 'penerima1';
        $order->address_receiver = 'Jl. Target, No.1';
        $order->save();
    }
}
