<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct(){

        $this->middleware('permission:view-category',['only' => ['index']]);
        $this->middleware('permission:create-category',['only' => ['create','store']]);
        $this->middleware('permission:update-category',['only' => ['edit','update']]);
        $this->middleware('permission:delete-category',['only' => ['destroy']]);
     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
           $request->validate(['name' => 'required|unique:categories,name']);
           if($request->status)
           {
                $status = 1;
           }
           else
           {
            $status = 0;
           }
     
        $result = Category::create([
            'name' => $request->get('name'),
            'status' => $status, 


        ]);


        if($result)
        {
            return back()->with('success','Category Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.create',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        if($category->name == $request->name)
        {
            $validation = 'required';

        }
        else
        {
            $validation = 'required|unique:categories,name';
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

       $category->name = $request->name;
       $category->status = $status;
   
       $result = $category->update();

       if($result)
       {
        return back()->with('success','Category Updated Successfully');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete())
        {
            return back()->with('success','Category Deleted Successfully');
        }
    }
}
