<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/selectize.css') }}" type="text/css">
    <title>RE/MAX | 404</title>
</head>

<body class="page-404" id="page-top">
<!-- Preloader -->
<div id="page-preloader">
    <div class="loader-ring"></div>
    <div class="loader-ring2"></div>
</div>
<!-- End Preloader -->

<!-- Wrapper -->
<div class="wrapper">
    <!-- Start Header -->
    <div id="header"></div>
    <!-- End Header -->

    <!-- Page Content -->
    <div id="page-content">
        <div class="container-404">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="text-404">
                            <div class="col-lg-4 col-md-offset-2 col-md-5 col-sm-offset-0 col-sm-6">
                                <h1>404</h1>
                            </div>
                            <div class="col-md-4 col-sm-6 no-page" style="margin-left: 50px;">
                                <span class="sorry">Sorry, no page Found!</span>
                                <p>The page you requested cannot be found , back to main page
                                    <a href="{{ route('/')  }}">main page</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Page Content -->

    <!-- Start Footer -->
    <div id="footer"></div>
    <!-- End Footer -->
</div>

<!-- Modal login, register, custom gallery -->
<div id="login-modal-open"></div>
<div id="register-modal-open"></div>
<!-- End Modal login, register, custom gallery -->

<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/selectize.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="{{ asset('assets/js/ie.js')}}"></script>
<![endif]-->
</body>
</html>