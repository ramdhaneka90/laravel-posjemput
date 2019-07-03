<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couriers extends Model
{
    protected $table = 'couriers';

    public function toOfficeRelation()
    {
    	return $this->belongsTo('App\Office','office_id');
    }

    public function relationToOrder()
    {
    	return $this->hasMany('App\Order');
    }
}
