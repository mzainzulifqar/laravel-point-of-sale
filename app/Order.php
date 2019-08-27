<?php

namespace App;
use App\Customer;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = ['customer_id','total_amount','payment_method','order_status','cashier_name','discount'];

    public function customer(){
    	return $this->belongsTo('App\Customer');
    }

    public function products()
    {
    	return $this->belongsToMany('App\Product','order_products')->withPivot('quantity');
    }
}
