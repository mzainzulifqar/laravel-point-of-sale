<?php

namespace App;

use App\Brand;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

	public $table = 'categories';
    protected $fillable = ['name','status'];

    public function brands(){
    	return $this->hasMany('App\Brand');
    }

     public function product(){
    	return $this->belongsTo('App\Product');
    }
}
