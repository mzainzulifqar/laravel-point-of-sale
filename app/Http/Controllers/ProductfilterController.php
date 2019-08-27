<?php

namespace App\Http\Controllers;

use App\Product;
use App\Productfilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ProductfilterController extends Controller
{
    public function __construct(){

    }

    public function index(){
    	$brands = DB::table('productfilters')->select('brand')->distinct()->pluck('brand');
    	$rams = DB::table('productfilters')->select('ram')->distinct()->pluck('ram');
    	$storages = DB::table('productfilters')->select('storage')->orderBy('storage','desc')->distinct()->pluck('storage');
    	
    	return view('backend.filter',compact('brands','rams','storages'));
    }

    public function fetch_products(Request $request){
    	$product = Productfilter::where('status','=',1);
    	if($request->has('minimum_price'))
    	{
    		$product->whereBetween('price',[$request->minimum_price,$request->maximum_price]);
    	}
    	if($request->has('brand')){
    		$product->whereIn('brand',$request->brand);
    	}
    	if($request->has('ram'))
    	{
    		$product->whereIn('ram',$request->ram);
    	}
    	if($request->has('storage'))
    	{
    		$product->whereIn('storage',$request->storage);
    	}

    	$product = $product->get();
    	$output  = '';
    	if($product->count() > 0)
    	{
    	foreach($product as $pp)
		{
			$output .= '
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:550px;">
					<img src="'. URL::to('public/images/').'/'.$pp->image  .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="#">'. $pp->name .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $pp->price .'</h4>
					<p>Camera : '. $pp->camera.' MP<br />
					Brand : '. $pp->brand .' <br />
					RAM : '. $pp->ram.' GB<br />
					Storage : '. $pp->storage .' GB </p>
				</div>

			</div>
			';
		}

	}
	else
		{
			$output .= "<h3>No data found</h3>";
		}
    	return response()->json($output);
	
    }

    public function sql(){
    	// $data  = Productfilter::all();
    	$data = DB::table('productfilters')->select('name','price')->get();
    	foreach ($data as $key => $value) {
    		echo "<pre>";
    		echo $value->price;	
    	}
    }
}
