<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{trans('home.name')}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">

</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        <!--=================================
 login-->

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url({{ URL::asset('assets/images/login-bg.jpg') }});">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    @if (App::getLocale() == 'en')
                    <div class="col-lg-4 col-md-6  bg text-left"
                        style="background-image: url({{ URL::asset('assets/images/purple.png') }});">
                        <div class="login-fancy text-left">
                    
                           <h3 class="float-left text-white " style="float: left">{{trans('home.fullname')}} </h3><p class="mb-20 text-white text-sm"> {{trans('home.info')}}</p>
                           <ul class="list-unstyled">
                          
                           
                          
                                <br>  <br>  <br>  <br>  <br> 
                                <p class="font-weight-bold text-capitalize text-lg-center"> You are {{$type}}</p>

                              <!--  <li class="list-inline-item"><a class="" style="color: yellow" href=""> للتسجيل اضغط هنا</a> </li>
                              --> 
                            </ul>

                        </div>
                    </div>
                    @else
                    @endif
                    <div class="col-lg-4 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 class="mb-30">{{trans('home.log')}}</h3>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">{{trans('home.email')}}*</label>
                                    <input type="hidden" value="{{$type}}" name="type">

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">{{trans('home.passowrd')}} * </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="section-field">
                                    <div class="remember-checkbox mb-30">
                                        <input type="checkbox" class="form-control" name="two" id="two" />
                                        <label for="two"> {{trans('home.remmeberme')}}</label>
                                        <a href="#" class="float-right">{{trans('home.forgotpassowrd')}}</a>
                                    </div>
                                </div>
                                <button class="button"><span>{{trans('home.login')}}</span><i class="fa fa-check"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = 'assets/js/';

    </script>

    <!-- chart -->
    <script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
    <!-- calendar -->
    <script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
    <!-- charts sparkline -->
    <script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
    <!-- charts morris -->
    <script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
    <!-- toastr -->
    @yield('js')
    <script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
    <!-- validation -->
    <script src="{{ URL::asset('assets/js/validation.js') }}"></script>
    <!-- lobilist -->
    <script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
    <!-- custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
