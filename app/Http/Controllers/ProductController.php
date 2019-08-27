<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
      public function __construct(){

        $this->middleware('permission:view-product',['only' => ['index']]);
        $this->middleware('permission:create-product',['only' => ['create','store']]);
        $this->middleware('permission:update-product',['only' => ['edit','update']]);
        $this->middleware('permission:delete-product',['only' => ['destroy']]);

    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products  = Product::paginate(10);
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer',
            'tax' => 'required|integer',
            'category_id' => 'required|integer',
            'brands' => 'required|integer',
            'status' => 'required'
        ]);

         if($request->status)
           {
                $status = 1;
           }
           else
           {
            $status = 0;
           }

        $result = Product::create([
            'name' => $request->name,
            'description' => $request->desc,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'tax' => $request->tax,
            'category_id' => $request->category_id,
            'brand_id' => $request->brands,
            'status' => $status,

        ]);

        if($result)
        {
            return back()->with('success','Product Added Successfully');
        }
        else
        {
            return back()->with('success','Whoops! Something went wrong please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('backend.product.create',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
           $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer',
            'tax' => 'required|integer',
            'category_id' => 'required|integer',
            'brands' => 'required|integer',
            
        ]);
            if($request->status)
           {
                $status = 1;
           }
           else
           {
            $status = 0;
           }

            $product->name = $request->name;
            $product->description = $request->desc;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->tax = $request->tax;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brands;
            $product->status = $status;

            if($product->update())
            {
                return back()->with('success','Product updated Successfully');
            }
            else
            {
                return back()->with('success','Product cannot be updated. Try Again!');   
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
        if($product->delete())
        {
            return back()->with("success",'Product Deleted Successfully');
        }
        else
        {
            return back()->with('success','Product cannot be deleted now..!!');
        }
    }


    public function category_brands($category)
    {
       
            $brands = Brand::where('category_id' ,'=', $category)->get();
            return response()->json($brands);
        
    }
}
