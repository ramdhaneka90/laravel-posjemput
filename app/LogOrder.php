<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogOrder extends Model
{
    protected $table = 'log_activities';


    public function orders()
    {
        return $this->hasMany('App\Order', 'id', 'order_id');
    }
}
