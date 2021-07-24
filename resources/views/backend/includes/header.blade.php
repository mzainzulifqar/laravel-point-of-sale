<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="POS" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('theme/assets/images/favicon.ico')}}">

    <link href="{{asset('theme/assets/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('theme/assets/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('theme/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('theme/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Pre-loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">Loading...</div>
    </div>
</div>
<!-- End Preloader-->