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
                                    <h2 class="mt-0 mb-3">Product</h2>
                                    @if (Session::has('success'))
                                        {{-- expr --}}
                                    
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!</strong> <span>{{Session::get('success')}}</span>
                                        
                                    </div>
                                    @endif
                                    <form role="form" action=@if(isset($product) )
                                    "{{route('product.update',$product->id)}}" @else() "{{route('product.store')}}" @endif method="post" >
                                    @if (isset($product))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" @if (isset($product->name)) value="{{$product->name}}" @else value="{{old('name')}}")
                                                
                                           
                                                
                                            @endif>
                                            

                                            @error('name')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>
                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="desc" id="input" class="form-control" rows="3" )
                                                
                                           
                                                
                                             >
                                                
                                                @if (isset($product->description)) {{$product->description}} @else {{old('desc')}}
                                                @endif
                                            </textarea>
                                            

                                            @error('desc')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                           <input type="number" name="price" class="form-control" @if (isset($product->price)) value="{{$product->price}}" @else value="{{old('price')}}")
                                                
                                           
                                                
                                            @endif>
                                        

                                            @error('price')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>

                                        <div class="form-group">
                                            <label>Quantity</label>
                                           <input type="number" name="quantity" class="form-control" @if (isset($product->quantity)) value="{{$product->quantity}}" @else value="{{old('quantity')}}")
                                                
                                           
                                                
                                            @endif>
                                        

                                            @error('quantity')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>

                                    <div class="form-group">
                                            <label>Tax (%)</label>
                                           <input type="number" name="tax" class="form-control" @if (isset($product->tax)) value="{{$product->tax}}" @else value="{{old('tax')}}")
                                                
                                           
                                                
                                            @endif>
                                        

                                            @error('tax')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>   
                <label for="">Category</label>
                
                <select name="category_id" id="category" class="form-control" required="required">
                    @if (isset($category))
                       @foreach ($category as $cc)
                           <option class="category_option" @if (isset($product) && $product->category_id == $cc->id) selected @endif value="{{$cc->id}}">{{$cc->name}}</option>
                       @endforeach
                    @endif
                 
                 </select>  


                 <label for="">Brands</label>
                
                <select name="brands" id="brands" class="form-control" required="required">
                    
                 
                 </select>                                   

                                        



                                           

                                      

                                           
                                           
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
                                                  <input type="checkbox" name="status" @if (isset($product))
                                                      @if ($product->status == 1)
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

              @section('scripts')
                  <script>
                      $(document).ready(function(){

                        var option  = $('#category option:selected').val();
                   
                        $.ajax({
                            url : '{{URL::to('fetch/category_brands')}}/'+ option,
                            method:'GET',
                            type:"ajax",
                            proccessData:false,
                            ContentType:false,
                            dataType:"json",
                            success:function(response)
                            {
                                if(response.length)
                                {
                                    var html = '';

                                    for($i=0;$i<response.length;$i++)
                                    {
                                        html += "<option value='"+response[$i].id+"'>"+ response[$i].name+ "</option>";
                                    }

                                    $('#brands').html(html);
                                }
                            }


                        });

                        // ajax code end here
                        $('#category').change(function(){
                            
                              var option  = $('#category option:selected').val();
                   
                        $.ajax({
                            url : '{{URL::to('fetch/category_brands')}}/'+ option,
                            method:'GET',
                            type:"ajax",
                            proccessData:false,
                            ContentType:false,
                            dataType:"json",
                            success:function(response)
                            {

                            $('#brands').html('');

                                if(response.length)
                                {
                                    var html = '';

                                    for($i=0;$i<response.length;$i++)
                                    {
                                        html += "<option value='"+response[$i].id+"'>"+ response[$i].name+ "</option>";
                                    }

                                    $('#brands').html(html);
                                }
                            }


                        });

                        // ajax code end here

                        });
                                              });


                  </script>
              @endsection