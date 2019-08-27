<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function __construct(){

        $this->middleware('permission:view-brand',['only' => ['index']]);
        $this->middleware('permission:create-brand',['only' => ['create','store']]);
        $this->middleware('permission:update-brand',['only' => ['edit','update']]);
        $this->middleware('permission:delete-brand',['only' => ['destroy']]);
     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('backend.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
         return view('backend.brand.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate(['name' => 'required|unique:brands,name']);
           if($request->status)
           {
                $status = 1;
           }
           else
           {
            $status = 0;
           }
     
        $result = Brand::create([
            'name' => $request->get('name'),
            'status' => $status,
            'category_id' => $request->category_id,



        ]);


        if($result)
        {
            return back()->with('success','Brand Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $category = Category::all(); 
        return view('backend.brand.create',compact('brand','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if($brand->name == $request->name)
        {
            $validation = 'required';

        }
        else
        {
            $validation = 'required|unique:brands,name';
        }

         if($request->status)
           {
                $status = 1;
           }
           else
           {
            $status = 0;
           }

       $request->validate(['name' => $validation]);

       $brand->name = $request->name;
       $brand->category_id = $request->category_id;
       $brand->status = $status;
   
       $result = $brand->update();

       if($result)
       {
        return back()->with('success','Brand Updated Successfully');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if($brand->delete())
        {
            return back()->with('success','Brand Deleted Successfully');
        }
    }
}
