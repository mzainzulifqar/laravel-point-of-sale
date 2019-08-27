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
                                    <h2 class="mt-0 mb-3">Category</h2>
                                    @if (Session::has('success'))
                                        {{-- expr --}}
                                    
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!</strong> <span>{{Session::get('success')}}</span>
                                        
                                    </div>
                                    @endif
                                    <form role="form" action=@if(isset($category) )
                                    "{{route('category.update',$category->id)}}" @else() "{{route('category.store')}}" @endif method="post" >
                                    @if (isset($category))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="{{@$category->name}}">
                                            

                                            @error('name')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>
                                      

                                        



                                           

                                      

                                           
                                           
                                        <div class="card" style="margin-top: 20px;">
                                      <div class="card-header">Status</div>
                                            @error('status')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                            {{-- {{dd($category)}} --}}
                                        <div class="card-body">

                                            <div class="row">
                                          
                                                <div class="col-md-2 col-sm-2 col-4">
                                                   <label class="switch checkbox-inline">
                                                  <input type="checkbox" name="status" @if (isset($category))
                                                      @if ($category->status == 1)
                                                          checked
                                                      @endif
                                                      
                                                  @endif> 
                                                  <span class="slider round"></span>

                                                </label>
                                            <br>Status
                                                </div> 

                                             
                                 
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