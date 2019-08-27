<?php

namespace App;

use App\Category;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //

    protected $fillable = ['name','category_id','status'];


    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }


}
