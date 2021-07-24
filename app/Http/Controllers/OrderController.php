<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Customer;
use Carbon\Carbon;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-order', ['only' => ['index']]);
        $this->middleware('permission:create-order', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-order', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-order', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('backend.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::where('number', '=', $request->number)->first();

        if (empty($customer)) {
            $customer = Customer::create(['name' => $request->name, 'number' => $request->number]);
        }

        $order = Order::create([
            'customer_id'    => $customer->id,
            'total_amount'   => $request->net_total,
            'order_status'   => 'active',
            'payment_method' => 'cash',
            'discount'       => (isset($request->dis)) ? $request->dis : '0',
            'cashier_name'   => Auth::user()->name,
            'created_at'     => Carbon::today(),
        ]);

        if ($order) {
            $products = ['products' => $request->products, 'quantity' => $request->quantity];

            for ($i = 0; $i < (count($products['products'])); $i++) {
                OrderProduct::create([
                    'order_id'   => $order->id,
                    'product_id' => $products['products'][$i],
                    'quantity'   => $products['quantity'][$i],
                ]);

                for ($j = 0; $j < count($products['products']) ; $j++) {
                    $product = Product::find($products['products'][$j]);
                    $product->update(
                        ['quantity' =>  $product->quantity - $products['quantity'][$j]]
                    );
                }
            }
        }

        return back()->with('success', 'Order #'.$order->id.' Placed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('backend.order.order_details', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if ($order->delete()) {
            return back()->with('success', 'Order deleted successfully');
        } else {
            return back()->with('success', 'Whoops Something went wrong');
        }
    }

    public static function fetch_products()
    {
        $products = Product::where('quantity', '>', 0)->get();
        $output = '';
        foreach ($products as $product) {
            $output .= '<option value="' . $product->id . '">' . $product->name . '</option>';
        }
        return $output;
        // return response()->json($products);
    }

    public function fetch_single_product(Request $request)
    {
        $product = DB::select('select price,quantity from products where status = 1 AND id = "' . $request->id . '"', [1]);
        return response()->json($product);
    }

    public function fetch_customer(Request $request)
    {
        $customer = Customer::where('number', '=', $request->number)->first();
        if (!empty($customer)) {
            return response()->json($customer);
        } else {
            return response()->json('Try Again');
        }
    }
}
