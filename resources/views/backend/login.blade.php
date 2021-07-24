<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - Dashboard LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="POS login" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('theme/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('theme/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

</head>



<body class="authentication-bg">

    <div class="home-btn d-none d-sm-block">
        <a href="/"><i class="fas fa-home h2 text-dark"></i></a>
    </div>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a href="/" style="font-size:28px;">
                            {{-- <span><img src="{{asset('theme/assets/images/logo-dark.png')}}" alt="" height="22"></span> --}}
                            LOGO
                        </a>
                        <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign In</h4>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control @error('email') is-invalid @enderror()" type="text"
                                        name="email" id="emailaddress" required="" value="{{old('email')}}"
                                        placeholder="Enter your email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror()"
                                        type="password" name="password" id="password" placeholder="Enter your password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-muted ml-1"><i
                                    class="fa fa-lock mr-1"></i>Forgot your password?</a>
                            @endif
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <!-- Vendor js -->
    <script src="{{asset('theme/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('theme/assets/js/app.min.js')}}"></script>

</body>

</html>