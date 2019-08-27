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
                                    <h2 class="mt-0 mb-3">Permission</h2>
                                    @if (Session::has('success'))
                                        {{-- expr --}}
                                    
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!</strong> <span>{{Session::get('success')}}</span>
                                        
                                    </div>
                                    @endif
                                    <form role="form" action=@if(isset($permission))
                                    "{{route('permission.update',$permission->id)}}" @else() "{{route('permission.store')}}" @endif method="post">
                                    @if (isset($permission))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Permission Name</label>
                                            <input type="text" class="form-control" name="permission" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Permission Name" value="{{@$permission->name}}">
                                            <small id="emailHelp" class="form-text text-muted">Kindly follow this format [ create - { permission-name } ].</small>
                                            
                                        </div>
                                            @error('permission')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                            <div style="padding-bottom: 10px;">
                                                
                                            </div>

                                            @if (isset($permission))
                                               <button type="submit" class="btn btn-primary">Update</button>
                                            @else
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            @endif
                                        
                                    </form>
                                
                            </div>
                            <!-- end col -->

                           

                        </div>
                        <!-- end row -->
                    
                </div>


                       
              @endsection()