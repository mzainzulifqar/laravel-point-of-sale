@extends('backend.layout.app')
@section('content')

<!-- Begin page -->

<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->

<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Total Revenue</h4>

                        <div class="widget-chart-1">
                            {{-- <div class="widget-chart-box-1 float-left" dir="ltr">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                                   data-bgColor="#F9B9B9" value="58"
                                                   data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                   data-thickness=".15"/>
                                        </div> --}}

                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{numberformat($revenue_today[0])}} </h2>
                                <p class="text-muted mb-1">Revenue today</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Total Products in stock</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-right">
                                <span class="badge badge-success badge-pill float-left mt-3">32% <i
                                        class="mdi mdi-trending-up"></i> </span>
                                <h2 class="font-weight-normal mb-1"> {{$products}} </h2>
                                {{-- <p class="text-muted mb-3">Revenue today</p> --}}
                            </div>
                            {{-- <div class="progress progress-bar-alt-success progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                    aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 77%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div> --}}
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Statistics</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                    data-bgColor="#FFE6BA" value="80" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                            </div>
                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> 4569 </h2>
                                <p class="text-muted mb-1">Revenue today</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-right">
                                <span class="badge badge-pink badge-pill float-left mt-3">32% <i
                                        class="mdi mdi-trending-up"></i> </span>
                                <h2 class="font-weight-normal mb-1"> {{$dailysales}} </h2>
                                <p class="text-muted mb-3">Revenue today</p>
                            </div>
                            <div class="progress progress-bar-alt-pink progress-sm">
                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="77"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                    <span class="sr-only">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->


            <div class="row">

                @if (isset($user))
                @foreach ($user as $members)
                {{-- expr --}}

                <div class="col-xl-3 col-md-6">
                    <div class="card-box widget-user">
                        <div>
                            <div class="avatar-lg float-left mr-3">
                                <img src="{{asset('images/'.$members->thumbnail)}}" class="img-fluid rounded-circle"
                                    alt="user">
                            </div>
                            <div class="wid-u-info">
                                <h5 class="mt-0">{{$members->name}}</h5>
                                <p class="text-muted mb-1 font-13 text-truncate">{{$members->email}}</p>
                                <small class="text-warning"><b>{{$members->role->pluck('name')}}</b></small>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                @endforeach
                @endif
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Right Sidebar -->
    @endsection()