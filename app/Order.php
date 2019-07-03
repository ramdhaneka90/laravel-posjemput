<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'customer_id','name_order', 'category', 'weight', 'status' , 'quantity','name_receiver','address_receiver', 
    ];
    protected $primaryKey = 'id';



    
    public static function rules($update = false, $id = null)
    {
        $rules = [
            'name_receiver'    => 'required',
            'name_order'         => 'required',
            'category'         => 'required',
            'quantity'         => 'required',
            'weight'        => 'required',
            'address_receiver'       => 'required',
        ];
        if ($update) {
            return $rules;
        }
        return array_merge($rules, [

        ]);

        }
        public function customer() {
            return $this->belongsTo('App\Customer');
        }

        public function relationToCourier()
        {
            return $this->belongsTo('App\Couriers');
        }
}
