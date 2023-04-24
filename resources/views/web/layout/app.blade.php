<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">

        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="./images/favicon.png">
        <!-- Page Title  -->
        <title>Rental</title>
        <!-- StyleSheets  -->
        {{-- @include('web.includes.link-css') --}}
        <link rel="stylesheet" href="{{ asset('web/fonts/icomoon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/jquery.fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web/fonts/flaticon/font/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/aos.css') }}">
       
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap" id="home-section">
            {{--  --}}
            @include('web.includes.site-menu-mobile')
            @include('web.includes.header')
            @include('web.includes.cover')

            @yield('sections')

            @include('web.includes.footer')
        </div>
        <!-- JavaScript -->
        {{-- @include('web.includes.link-js') --}}
        <script src="{{ asset('web/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('web/js/popper.min.js') }}"></script>
        <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('web/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('web/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('web/js/jquery.animateNumber.min.js') }}"></script>
        <script src="{{ asset('web/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('web/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('web/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('web/js/aos.js') }}"></script>
        <script src="{{ asset('web/js/main.js') }}"></script>
    </body>
</html>
