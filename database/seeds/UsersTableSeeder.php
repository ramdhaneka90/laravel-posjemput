<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->office_id = 1;
        $user->name = 'operator1';
        $user->email = 'operator1@gmail.com';
        $user->password = 'operator1';
        $user->save();
    }
}
