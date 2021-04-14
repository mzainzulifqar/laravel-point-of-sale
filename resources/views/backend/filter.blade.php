<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href = "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel = "stylesheet">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- Custom CSS -->
    <style type="text/css" media="screen">
       
.slide-image {
    width: 100%;
}

.carousel-holder {
    margin-bottom: 30px;
}

.carousel-control,
.item {
    border-radius: 4px;
}

.caption {
    height: 160px;
    overflow: hidden;
}

.caption h4 {
    white-space: nowrap;
}

.thumbnail img {
    width: 100%;
}

.ratings {
    padding-right: 10px;
    padding-left: 10px;
    color: #d17581;
}

.thumbnail {
    padding: 0;
}

.thumbnail .caption-full {
    padding: 9px;
    color: #333;
}

footer {
    margin: 50px 0;
}
    </style>
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
         <br />
         <h2 align="center">Advance Ajax Filters</h2>
         <br />
            <div class="col-md-3">                    
    <div class="list-group">
     <h3>Price</h3>
     <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>    
                <div class="list-group">
     <h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        @foreach ($brands as $brand)
                          <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="{{$brand}}">{{$brand}}</label>
                    </div>
                        @endforeach
                    </div>
                </div>

    <div class="list-group">
     <h3>RAM</h3>
                    @foreach ($rams as $ram)
                      
                    
                     <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="{{$ram}}">{{$ram}}GB</label>
                    </div>
                    @endforeach
                </div>
    <div class="list-group">
     <h3>Internal Storage</h3>
                  @foreach ($storages as $storage)
                      
                    
                     <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector storage" value="{{$storage}}">{{$storage}}GB</label>
                    </div>
                    @endforeach
                
            </div>
          </div>


            <div class="col-md-9">
            
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
 text-align:center; 
 background: url({{asset('images/loader.gif')}}) no-repeat center; 
 height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"{{URL::to('/fetch_products')}}",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage,_token:"{{csrf_token()}}"},
            success:function(data){
              var html = '';
              var i = 0;

              if(data.length > 0)
              {
                // console.log(data);
                // return false;
                $('.filter_data').html(data);

              }
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>
