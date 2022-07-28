<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/images/android-icon-72x72.png') }}" />

    <!-- TITLE -->
    <title>Admin</title>

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('/public/admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('/public/admin/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('/public/admin/assets/css/skin-modes.css') }}" rel="stylesheet" />
    <link href="{{ asset('/public/admin/assets/css/dark-style.css') }}" rel="stylesheet" />

    <!-- SINGLE-PAGE CSS -->
    <link href="{{ asset('/public/admin/assets/plugins/single-page/css/main.css') }}" rel="stylesheet" type="text/css">
    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('/public/admin/assets/css/icons.css') }}" rel="stylesheet" />
    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('/public/admin/assets/colors/color1.css') }}" />

</head>

<body>

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">
        {{-- <div id="global-loader">
            <img src="{{ asset('/public/admin/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div> --}}
        <!-- PAGE -->
        <div class="page" style="    background-color: white;">
            <div class=""  style="    background-color: white;">
                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto">
                    <div class="text-center">
                        {{-- <img src="{{url('/public/images/logo.png')}}" class="header-brand-img" alt=""> --}}
                    </div>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-6">

                        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <span class="login100-form-title">
                                Login
                            </span>
                            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                <input class="input100 @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" require autocomplete="email" autofocus>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100 @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{--<div class="text-right pt-1">
                                <p class="mb-0">
                                    @if (Route::has('password.request'))
                                    <a class="text-primary ml-1" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </p>
                            </div> --}}
							@if(count( $errors ) > 0)
								@foreach ($errors->all() as $error)
								   <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>{{ $error }}</p></div>
								@endforeach
							@endif
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">
                                    Login
                                </button>
                            </div>
                            {{-- <div class="text-center pt-3">
                                <p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ml-1">Sign UP now</a></p>
                            </div>
                            <div class=" flex-c-m text-center mt-3">
                                <p>Or</p>
                                <div class="social-icons">
                                    <ul>
                                        <li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus text-google-plus"></i> Sign up with Google</a></li>
                                        <li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook text-facebook"></i> Sign in with Facebook</a></li>
                                    </ul>
                                </div>
                            </div> --}}




                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('/public/admin/assets/js/jquery-3.4.1.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('/public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
