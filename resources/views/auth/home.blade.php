<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title> {{trans('home.name')}}</title>
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}" type="image/x-icon" />
    @toastr_css

    <!-- Favicon -->

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">




</head>

<body>

    <div class="wrapper">

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
                 style="background-image: url('{{ asset('assets/images/sativa.png')}}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30 text-center">{{trans('home.type')}}</h3>
                            <div class="form-inline">
                                <a class="btn btn-default col-lg-3" title="{{trans('home.student')}}" href="{{route('login.show','student')}}">
                                    <img alt="student" width="100px;" src="{{URL::asset('assets/images/student.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="{{trans('home.parent')}}" href="{{route('login.show','parent')}}">
                                    <img alt="parent" width="100px;" src="{{URL::asset('assets/images/parent.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="{{trans('home.teacher')}}" href="{{route('login.show','teacher')}}">
                                    <img alt="teacher" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="{{trans('home.admin')}}" href="{{route('login.show','admin')}}">
                                    <img alt="admin" width="100px;" src="{{URL::asset('assets/images/admin.png')}}">
                                </a>
                            </div>

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
        var plugin_path = 'js/';
    </script>


    <!-- toastr -->
    @yield('js')
    <!-- custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>
    @jquery
    @toastr_js
    @toastr_render
</body>

</html>