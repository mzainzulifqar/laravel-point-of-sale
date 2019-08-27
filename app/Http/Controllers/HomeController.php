<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        // dd(Carbon::today());    
       $user = User::where('email','!=','admin@gmail.com')->inRandomOrder()->take(4)->get();
       $dailysales = count(Order::whereDate('created_at','=',Carbon::today())->get());
       $revenue_today =  DB::table('orders')->selectRaw('sum(total_amount)')->whereDate('created_at',Carbon::today())->pluck('sum(total_amount)');
       $products = count(Product::where('quantity','>',0)->orWhere('status','=','active')->get());
       // dd($products);

      
       
        return view('backend.index',compact('user','dailysales','revenue_today','products'));
    }
}
