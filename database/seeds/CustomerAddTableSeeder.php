<?php

use Illuminate\Database\Seeder;
use App\CustomerAddress;

class CustomerAddTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add = new CustomerAddress;
        $add->customer_id = 1;
        $add->address = 'Jl.Asal, No.1';
        $add->status = 'on';
        $add->save();
    }
}
