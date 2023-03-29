<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">

        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="./images/favicon.png">
        <!-- Page Title  -->
        <title>Blank - Layout | DashLite Admin Template</title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.2') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.2') }}">
       
    </head>
    <body>
        <div class="nk-app-root">
            <!-- main @s -->
            <div class="nk-main ">
                @include('painel.componentes.side-bar')
                <!-- wrap @s -->
                <div class="nk-wrap ">
                  @include('painel.componentes.header')
                    <!-- content @s -->
                    <div class="nk-content ">
                        <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    @yield('titulo')
                                    @yield('main')
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content @e -->
                    <!-- footer @s -->
                    @include('painel.componentes.footer')
                    <!-- footer @e -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- JavaScript -->
        <script src="{{ asset('assets/js/bundle.js?ver=3.1.2') }}"></script>
        <script src="{{ asset('assets/js/scripts.js?ver=3.1.2') }}"></script>
    </body>
</html>
