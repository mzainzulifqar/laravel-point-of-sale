<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


      public function __construct(){
        $this->middleware('permission:view-user',['only' => 'index']);
        $this->middleware('permission:create-user',['only' => ['create','store']]);
        $this->middleware('permission:update-user',['only' => ['edit','update']]);
        $this->middleware('permission:delete-user',['only' => ['destroy']]);
     
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(6);
        return view('backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->fetchRoles();
        return view('backend.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $messages = array(
                'roles.required' => 'Please select atleast one role checkbox',
            );
        $request->validate(
            [
                'name' => 'required|unique:users,name',
                'email'=>'required|unique:users,email',
                'password' => 'required',
                'roles' => 'required',
            ],
            $messages


        );
            $roles = array();
              foreach ($request->roles as $key => $value) {
                $roles[] = "".$key."";
            }


            if($request->has('image'))
            {
                $ext  = $request->image->getClientOriginalExtension();
                $name = time().".".$ext;
                $request->image->move(public_path('images'),$name);

            }
        
        

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'thumbnail' => isset($name) ? $name : 'dummy.png',
        ]);


        if($user)
        {
            $user->role()->attach($roles);
            return back()->with('success','User Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = $this->fetchRoles();
        return view('backend.user.create',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        // dd($user->password);
        if($user->email == $request->email)
        {
            $validation = 'required';
        }
        else
        {
            $validation = 'required|unique:users,email';
        }

         $request->validate(
            [
                'email' => $validation,
                'name'=>'required',
                'roles' => 'required'
            ]);
                // to get key name from roles array..!!!
            $roles = array();
              foreach ($request->roles as $key => $value) {
                $roles[] = "".$key."";
            } 


       // inserting user
       $user->name = $request->name;
       $user->email = $request->email ?? $user->email;
       $user->password = (isset($request->password)) ? bcrypt($request->password) : $user->password;
     
       $result = $user->update();

       if($result)
       {
        $user->role()->detach();
        $user->role()->attach($roles);
        return back()->with('success','User Updated Successfully');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
       if($user->delete())
       {
        return back()->with('success','User Deleted Successfully');
       }
    }

    public function fetchRoles(){
       return Role::all();
    }

}