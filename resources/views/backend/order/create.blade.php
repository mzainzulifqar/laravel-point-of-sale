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
                                    <h2 class="mt-0 mb-3">Order Now</h2>
                                    @if (Session::has('success'))
                                        {{-- expr --}}
                                    
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!</strong> <span>{{Session::get('success')}}</span>
                                        
                                    </div>
                                    @endif
                                  
                                        
                                     
                                       <form role="form" action=@if(isset($category) )
                                    "{{route('category.update',$category->id)}}" @else() "{{route('order.store')}}" @endif method="post" >
                                    @if (isset($category))
                                        @method('PUT')
                                    @endif

                                        @csrf

                     <!-- Form row -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-box" style="box-shadow: 0 20px 35px 0 lightgrey">


                                    

                                   
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4" class="col-form-label">Name</label>
                                                <input type="text" class="form-control"  name="name" placeholder="Name" id="name" required>
                                                 @error('name')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4" class="col-form-label">Phone Number</label>
                                                <input type="number" name="number" class="form-control" id="number" placeholder="Number" required>
                                                <span class="help-block"><small>Please enter number first.</small></span>
                                            </div>
                                        </div>
                                        </div>
                                                 {{-- card end here --}}


                                       

                                      <div class="card-box" style="box-shadow: 0 25px 35px 0 lightgrey">
                                        <div class="form-group">
                                           
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Sub Total</label>
                                                <input type="number"  name="sub_total" class="form-control" id="sub_total">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">GST (18%)</label>
                                                <input type="number" class="form-control" name="gst" id="gst">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Discount</label>
                                                <input type="text" class="form-control" id="dis" name="dis">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Net Total</label>
                                                <input type="number" class="form-control" id="net_total" name="net_total">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Paid</label>
                                                <input type="number" class="form-control" id="paid" name="paid">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Due</label>
                                                <input type="number" class="form-control" id="due" name="due">
                                            </div>
                                       
                                        </div>
                                       {{--  <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkmeout">
                                                <label class="custom-control-label" for="checkmeout">Check me out</label>
                                            </div>
                                        </div> --}}
                                      
                                   
                                </div>
                            </div>
                            <div class="col-md-8">
                                 <div class="form-group" id="rows bg-info" style="box-shadow: 0 25px 35px 0 lightgrey">
                                           
                                          <table class="table table-bordered table-striped table-responsive" id="user_table">
                                           <thead>
                                            <tr>
                                                <th width="35%">Products</th>
                                                <th width="25%">Quantity</th>
                                                <th width="45%">Price</th>
                                                <th width="35%">Total</th>
                                                <th width="30%">Action</th>
                                            </tr>
                                           </thead>
                                           <tbody>

                                           </tbody>
                                           <tfoot>
                                            <tr>
                                             <td colspan="2" align="right">&nbsp;</td>
                                             <td>
                                              
                                             </td>
                                            </tr>
                                           </tfoot>
                                       </table>
                                              
                                            
                                        </div>
                           </div>
                           {{-- end of col --}}
                        </div>
                        <!-- end row -->        
                                      
                                        <button type="submit" class="btn btn-danger btn-block">Order Submit</button>


                                   
                                </div>

                            </div>
                            <!-- end col -->

                          

                           

                        </div>
                        <!-- end row -->

                         </form>
                    
                </div>



                       
              @endsection()
              @section('scripts')
                  <script  type="text/javascript" charset="utf-8" async defer>
                    $(document).ready(function()
                    {
                        var count = 1;
                        html = '';


                 dynamic_field(count);
                 function add_select(){

                          $('body').find('#products').select2();
                 }
                 
                 function dynamic_field(number)
                 {
                  
                  html = '<tr>';
                        html += '<td> <select name="products[]" id="products" class="form-control pid" ><option value="" readonly>Chose Product</option>{{!! \App\Http\Controllers\OrderController::fetch_products() !!}</select></td>';
                        
                        
                        html += '<td><input type="number" name="quantity[]" class="form-control qty" /><input type="hidden" name="total_quantity" class="form-control tqty" /></td>';
                        html += '<td><input type="text" name="" class="form-control price" readonly /></td>';
                        html += '<td>Rs<span class="total">0</span></td>';
                        // $('#products:last').select2();
                        if(number > 1)
                        {
                            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                            // $('#products:last').select2();
                            
                            $('tbody').append(html);
                            
                        }
                        else
                        {   
                            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                            
                            $('tbody').html(html);
                          

                            
                        }    
                          add_select();


                 }
              


                 $(document).on('click', '#add', function(){
                  count++;

                  dynamic_field(count);  
                 });

                 $(document).on('click', '.remove', function(){
                  count--;
                  $(this).closest("tr").remove();
                 });
                 

                $('tbody').delegate('.pid','change',function(){
                   var id = $(this).val();
                   var tr  = $(this).parent().parent();

                   $.ajax({
                    url : "{{URL::to('fetch_single_product')}}",
                    method:"post",
                    data: {"id": id,"_token": "{{ csrf_token() }}"},
                    dataType:"json",
                    success:function(response)
                    {
                      

                      tr.find('.qty').val(1);
                      tr.find('.price').val(response[0]['price']);
                      tr.find('.total').text(1*response[0]['price'])
                      tr.find('.tqty').val(1*response[0]['quantity'])
                      $('#dis').val(0);

                      calculation(0,0);
                    }


                   });
                });

                 

                $('tbody').on('keyup','.qty',function(){
                    var qty = $(this).val();
                    var tr = $(this).parent().parent();
                   var price =  tr.find('.price').val();
                    var new_total = qty * price;
                    tr.find('.total').text(new_total);
                    calculation(0,0);
                });


                $('tbody').on('keyup','.qty',function(){
                    var qty = $(this).val();
                    var tr = $(this).parent().parent();
                    var tqty = tr.find('.tqty').val();
                     
                    if(isNaN(qty))
                    {
                      alert('Please Select a valid quantity');
                      $(this).val(1);
                      tr.find('.total').text(tr.find('.price').val());
                      calculation(0,0);
                     
                    }
                    else if((qty - 0) > (tqty - 0))
                    {
                      
                        alert('Sorry this much quantity is not available');
                        $(this).val(1);
                      tr.find('.total').text(tr.find('.price').val());
                      calculation(0,0);
                      
                    }
                    else
                    {
                      if(qty <= 0)
                      {
                        $(this).val(1);
                      tr.find('.total').text(tr.find('.price').val());
                      calculation(0,0);
                     
                      }
                    }

                });

                 
                function calculation(dis,paid){
                  var sub_total = 0;
                  var net_total = 0;
                  var discount = dis;
                  var paid  = paid;

                  

                    $('.total').each(function(){
                      sub_total = sub_total + ($(this).html()*1);

                    });
                    

                  $('#sub_total').val(sub_total);

                  if(sub_total > 0)
                  {
                    var tax = (sub_total * 18) / 100;
                     $('#gst').val(Math.round(tax)); 
                     var net_total = tax + sub_total;
                     $('#net_total').val(Math.round(net_total));
                     
                    if(discount > 0)
                      {
                        var net_total = net_total - discount;
                       
                         $('#net_total').val(Math.round(net_total));

                      }

                    if(paid > 0)
                    {
                      net_total = Math.round(net_total - paid);
                      $('#due').val(net_total);
                    }
               
                  }

                }

                $('#dis').keyup(function(){
                    var discount = $(this).val();
                    
                    calculation(discount);
                });

                $('#paid').keyup(function(){
                    var paid = $(this).val();
                    var discount  = $('#dis').val();
                    calculation(discount,paid);
                });


                // sending ajax request to fetch customer

                $('#number').keyup(function(){
                    var number = $(this).val();

                    if(number.length > 11)
                    {
                      alert('Please enter a valid number');
                      $('#number').val('');
                      $('#name').val('');
                    }
                    else
                    {
                      $.ajax({
                        url:"{{URL::to('fetch_customer')}}",
                        method:"POST",
                        data:{'number' : number,"_token":"{{csrf_token()}}"},
                        dataType:'json',
                        success:function(response)
                        {
                          if(response.name != '')
                          {
                            $('#name').val(response.name);
                          }
                        }
                      });
                    }
                }); 

                    });
                
                  </script>
              @endsection