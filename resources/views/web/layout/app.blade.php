<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">

        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="./images/favicon.png">
        <!-- Page Title  -->
        <title>Rental</title>
        <!-- StyleSheets  -->
        @include('web.includes.link-css')
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
        @include('web.includes.link-js')
    </body>
</html>
