<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
	use Notifiable;

    protected $table = 'customers';
    protected $guard = 'customer';


    protected $fillable = [
        'name', 'email', 'password', 'phone','saldo'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
    	return $this->hasMany('App\Order');
    }

    public function customerAddress() {
    	return $this->hasMany('App\CustomerAddress');
    }

    public function tagihanCustomer()
    {
        return $this->hasMany('App\DepoModel');
    }
}
