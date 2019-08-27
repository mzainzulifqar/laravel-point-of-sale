<?php

namespace App;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = ['name','number'];

    public function orders(){
    	return $this->hasMany('App\Order');
    }
}
