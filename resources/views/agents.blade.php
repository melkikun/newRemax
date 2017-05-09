<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <title>Agents</title>
</head>

<body class="page" id="page-top">
<!-- Preloader -->
<div id="page-preloader">
    <div class="loader-ring"></div>
    <div class="loader-ring2"></div>
</div>
<!-- End Preloader -->

<!-- Wrapper -->
<div class="wrapper">
    <!-- Start Header -->
    <div id="header">@include('layout.header')</div>
    <!-- End Header -->
    <!-- Page Content -->
    {{--<div id="page-content" class="alignCenter">--}}
    <div class="wide-1">
        {{--<div id="page-content" class="contact-us">--}}

        <?php $uri = 'http://genius.intelligence.id/papi/'; ?>

        @include('layout.modal_inquiry_agent')

        @foreach($body->data as $content)

            @foreach($body->linked->wbinFileId as $linked)
                @if($content->links->wbinFileId == $linked->id)
                    <div class="parallax"
                         style="background-image: url({{ $uri.$linked->filePreview }})">
                        <div class="caption">
                            <span class="border">{{ $content->wbilTitle }}</span>
                        </div>
                    </div>
                @endif

            @endforeach

            <div class="wrapper-main-agent">
                <?php echo $content->wbilContent; ?>
            </div>
        @endforeach

    </div>
</div>

<div id="footer">@include('layout.footer')</div>

<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<!--[if gt IE 8]-->
<script type="text/javascript" src="{{ asset('assets/js/ie.js') }}"></script>
<!--[endif]-->
</body>
</html>