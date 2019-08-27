<?php

namespace App;
use App\Brand;
use App\Category;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','category_id','brand_id','product_id','description','price','tax','quantity','status'];


    public function brand(){
    	return $this->belongsTo('App\Brand');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }

}
