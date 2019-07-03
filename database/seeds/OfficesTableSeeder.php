<?php

use Illuminate\Database\Seeder;
use App\Office;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $office = new Office;
        $office->code_unit = '81hgda';
        $office->address = 'Jl.Mana Aja, No.2';
        $office->save();
    }
}
