<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = 'offices';

    public function hasCouriers()
    {
    	return $this->hasMany('App\Couriers');
    }

    public function hasOperator(){
    	return $this->hasOne('App\User');
    }
}
