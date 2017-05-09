<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/selectize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/logo-slider.css') }}" type="text/css">

    <title>@yield('title')</title>
</head>

<body class="page" id="page-top">

<div id="page-preloader">
    <div class="loader-ring"></div>
    <div class="loader-ring2"></div>
</div>

<div class="wrapper">

    <div id="header">@yield('header')</div>

    <div id="container_here">@yield('content')</div>

    <div id="footer">@yield('footer')</div>

</div>


<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/selectize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    jQuery(document).ready(function($){
        $("a").click(function(event){
            link = $(this).attr("href");
            $.ajax({
                        url: link,
                    })
                    .done(function(html){
                        $("#container_here").empty().append(html);
                    })
                    .fail(function(){
                        console.log("error");
                    })
                    .always(function(){
                        console.log("complete");
                    });
            return false;
        });
    });
</script>

<!--[if gt IE 8]>-->
<script type="text/javascript" src="{{ asset('assets/js/ie.js') }}"></script>
<!--[endif]-->
@yield('script')

</body>
</html>