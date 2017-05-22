<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>@yield('title')</title>
    <link href="{{ asset('assets/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}" type="text/css">
    @yield('css')
</head>

<body class="page-homepage" id="page-top">
    <!-- Preloader -->
    <div id="page-preloader">
        <div class="loader-ring"></div>
        <div class="loader-ring2"></div>
    </div>
    <!-- End Preloader -->
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Start Header -->
        @if (Request::path() == "/")
        <div id="header" class="menu-wht"> 
            @include('layout.header')
        </div>
        @else
        @include('layout.header')
        @endif
        <!-- End Header -->
        @yield('content')
        <!-- End Page Content -->
    </div>
    @if (Request::path() != "/")
    <div id="footer">@include('layout.footer')</div>
    @endif
    <script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>
    @yield('js')
</body>
</html>