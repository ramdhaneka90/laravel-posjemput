<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cus = new Customer;
        $cus->name = 'customer1';
        $cus->email = 'customer1@gmail.com';
        $cus->password = 'customer1';
        $cus->phone = '0898761232';
        $cus->save();
    }
}
