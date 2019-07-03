<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepoModel extends Model
{
    protected $table = 'deposit';
    public $timestamps = false;

    public function CustomerToDepo()
    {
    	return $this->belongsTo('App\Customer','customer_id');
    }
}
