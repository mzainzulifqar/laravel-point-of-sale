@extends('backend.layout.app') 

    @section('content')
           <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h2>Customer</h2>
                                    <div class="responsive-table-plugin" style="padding-bottom: 15px;">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>Success!</strong> {{Session::get('success')}}
                                        </div>    
                                        @endif
                                        
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th data-priority="1">Name</th>
                                                        <th>Number</th>
                                                        <th>View Orders</th>
                                                        <th>Delete</th>
                                                       
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($customer))
                                                           
                                                        
                                                        @foreach ($customer as $cc)
                                                            {{-- expr --}}
                                                     
                                                    <tr>
                                                        <td>{{$cc->id}}</td>
                                                        <td>{{uppercase($cc->name)}}</td>
                                                        <th>{{$cc->number}}</th>
                                                        <td><a href="{{route('orders.filter',['customer' => $cc->id])}}" class="btn btn-bordred-primary waves-effect  width-md waves-light">View Orders</a></td>
                                                        <td>
                                                            <p  onclick="event.preventDefault();document.getElementById('del-form-{{$cc->id}}').submit()" class="btn btn-bordred-danger waves-effect  width-md waves-light">Delete</p></td>

                                                        <form id="del-form-{{$cc->id}}" action="{{url('customer/'.$cc->id)}}" method="POST" style="display:none;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$cc->id}}">
                                                           
                                                        </form>
                                                        

                                                       
                                                    </tr>
                                                      @endforeach
                                                      @else
                                                       <tr>
                                                        <th colspan="6">
                                                            <h2 class="text-center">No data found</h2>
                                                        </th>
                                                       </tr>
                                                      @endif
                                                    </tbody>
                                                </table>
                                            </div>


    
                                        </div>

                                    </div>
                                    {{$customer->links()}}
                                </div>

                            </div>

                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

               

      @endsection()

























