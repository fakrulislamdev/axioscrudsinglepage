<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="fakrulislam">
    <title>@yield('title','Admin') | Admin</title>
     <!-- Site icon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Scripts -->

   <!-- Theme Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/slidebars.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @stack('css')
</head>
<body class="sticky-header">
        @yield('admin_body')

        <!-- jQuery -->
        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-migrate.js')}}"></script>
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/js/slidebars.min.js')}}"></script>
        <!--app js-->
        <script src="{{asset('assets/js/jquery.app.js')}}"></script>
        @stack('script')
    </body>
</html>
