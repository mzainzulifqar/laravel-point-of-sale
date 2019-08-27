<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

      public function __construct(){

        $this->middleware('permission:view-customer',['only' => ['index']]);
        $this->middleware('permission:create-customer',['only' => ['create','store']]);
        $this->middleware('permission:update-customer',['only' => ['edit','update']]);
        $this->middleware('permission:delete-customer',['only' => ['destroy']]);
        $this->middleware('permission:customer-orders',['only' => ['orders']]);

    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::paginate(10);
        return view('backend.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the customer orders.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , Customer $customer)
    {
        // dd($request->name);
        $orders  = Order::where('customer_id','=',$customer->id);

        if($request->name)
        {
            if ($request->name == 'date') {
                $orders->orderBy('created_at','desc');
            }
            elseif ($request->name == 'price') {
                $orders->orderBy('price','AESC');
            }
        }
        $orders   = $orders->paginate(10);

        return view('backend.customer.orders',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
          if($customer->delete())
          {
            return back()->with('success','Customer Deleted Successfully');
          }
          else
          {
            return back()->with('success','Something Went Wrong'); 
          }
    }

    public function orders(Request $request)
    {
        $orders  = Order::where('customer_id','=',$request->customer);

        if($request->name)
        {
            if ($request->name == 'date') {
                $orders->orderBy('created_at','desc');
            }
            elseif ($request->name == 'price') {
                $orders->orderBy('total_amount','desc');
            }
            elseif ($request->name == 'This-Week') {
                $date = Carbon::today()->subDays(7);
                $orders->where('created_at' ,'>',$date);
            }
             elseif ($request->name == 'This-Month') {
                $month = Carbon::now()->month();
                
                $orders->where('created_at' ,'>',$month);
            }
        }
        $orders   = $orders->paginate(10);

        return view('backend.customer.orders',compact('orders'));
    }

   
}
