<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct(){
        $this->middleware('permission:view-permission',['only' => 'index']);
        $this->middleware('permission:create-permission',['only' => ['create','store']]);
        $this->middleware('permission:update-permission',['only' => ['edit','update']]);
        $this->middleware('permission:delete-permission',['only' => ['destroy']]);
     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
       
        return view('backend.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Permission::create(['name' =>$request->permission]);
        if($result)
        {
            return back()->with('success','Permission Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('backend.permissions.create',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {

        if($permission->name == $request->permission)
        {
            $validation = 'required';
        }
        else
        {
            $validation = 'required|unique:permissions,name';
        }
        $request->validate(['permission' => 'required|unique:permissions,name']);

        $permission->name = $request->permission;
        if($permission->update())
        {
            return back()->with('success','Permission updated Successfully');
        }
    }

    /**

     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
         if($permission->delete())
        {
            return back()->with('success','Permission deleted Successfully');
        }
    }



      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
    	
         $result = Permission::where('name','like','%'.$request->name.'%')->get();
         return view('backend.permissions.index',compact('result'));
    }
}
