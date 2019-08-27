@extends('backend.layout.app')
@section('content')            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                        <!-- end row -->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h2 class="mt-0 mb-3">Role</h2>
                                    @if (Session::has('success'))
                                        {{-- expr --}}
                                    
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!</strong> <span>{{Session::get('success')}}</span>
                                        
                                    </div>
                                    @endif
                                    <form role="form" action=@if(isset($role))
                                    "{{route('role.update',$role->id)}}" @else() "{{route('role.store')}}" @endif method="post">
                                    @if (isset($role))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Role</label>
                                            <input type="text" class="form-control" name="role" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Role Name" value="{{@$role->name}}">
                                            

                                            @error('role')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()

                                            <div>
                                              @error('permission')
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                            @enderror()
                                            @if (isset($role))
                                            
                                            @php

                                                $name = permission_name($role->permissions);
                                            @endphp

                                            @endif
                                        <div class="card" style="margin-top: 20px;">
                                      <div class="card-header">Permissions</div>
                                        <div class="card-body">
                                            <div class="row">
                                            @foreach ($permissions as $permission)
                                          
                                                <div class="col-md-2 col-sm-2 col-4">
                                                   <label class="switch checkbox-inline">
                                                  <input type="checkbox" name="permission[{{$permission->name}}]"   @if(isset($role) && in_array($permission->name,$name)) checked @endif>
                                                  <span class="slider round"></span>

                                                </label>
                                                <p>{{$permission->name}}</p>
                                                </div> 

                                                
                                            @endforeach
                                 
                                            </div>

                                        </div>
                                  
                                          
                                       </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- end col -->

                           

                        </div>
                        <!-- end row -->
                    
                </div>


                       
              @endsection()