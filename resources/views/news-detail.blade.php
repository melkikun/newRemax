<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/fonts/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/selectize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/customsas.css') }}" type="text/css">


    <title>News</title>
</head>

<body class="page-news">

<div id="fb-root"></div>


<style>
    .image-news .caption-news {
        vertical-align: middle;
        text-align: center;
        top: 50%;
    }

    .caption-news span.border {
        background-color: #E21A22;
        opacity: 0.7;
        color: white;
        padding: 18px;
        letter-spacing: 5px;
        font-size: 13px;
        border: 2px;
        border-radius: 10px
    }

</style>


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
    <div id="page-content" class="blog-styles">

        <div class="container-news">

            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('news')}}">News</a></li>
                <li class="">{{ $body->data->wbnlTitle->en }}</li>
            </ol>

            <div class="content-news">
                <header class="article-wrapper" style="margin-bottom: 20px">
                    <h2 class="article-title">{{ $body->data->wbnlTitle->en }}</h2>
                    <span class="news-day" style="color:#DF1A23">{{ Carbon\Carbon::parse($body->data->wbnlCreatedTime->en)->format('D')  }} ,</span>
                    <span class="news-date" style="color:#DF1A23;">{{ $body->data->wbnlCreatedTime->en }} ,</span>
                    <span class="news-created" style="color:#DF1A23;">Created By: {{ $body->data->wbnlCreatedUserId->en }}</span>
                </header>

                <div class="share-news">
                    <ul>
                        <li>SHARE</li>
                        <li><a href="http://www.facebook.com/share.php?u={{ url('news.detail',$body->data->id) }}&title={{ $body->data->wbnlTitle->en }}"><img src="{{ asset('assets/img/remax-fb.png') }}" alt=""></a></li>
                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url={{ url('news.detail',$body->data->id) }}&title={{ $body->data->wbnlTitle->en }}"><img src="{{ asset('assets/img/remax-in.png') }}" alt=""></a></li>
                        <li><a href="http://twitter.com/home?status={{ $body->data->wbnlTitle->en }}+{{ url('news.detail',$body->data->id) }}"><img src="{{ asset('assets/img/remax-tw.png') }}" alt=""></a></li>
                        <li><a href="https://plus.google.com/share?url={{ url('news.detail',$body->data->id) }}"><img src="{{ asset('assets/img/remax-gp.png') }}" alt=""></a></li>
                    </ul>
                </div>
            </div>

            <div id="main">
                <div class="content-news" style="margin-bottom: 40px;">
                    <div class="news-detail">
                        @if($body->linked->wbneFileId != null)
                            <img src="{{ $uri.$body->linked->wbneFileId->filePreview.'?size=600,500' }}" alt="">
                        @endif
                        <br>
                        <?php echo $body->data->wbnlContent->en; ?>

                    </div>

                </div>

            </div>

        </div>
    </div>


    <!-- Start Footer -->
    <div id="footer">@include('layout.footer')</div>
    <!-- End Footer -->
</div><!-- Wrapper -->

<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/selectize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<!--[if gt IE 8]> -->
<script type="text/javascript" src="{{ asset('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/readmore.min.js') }}"></script>
<!--[endif]-->

<script>
    $('.article-news').readmore({
        collapsedHeight: 300
    });
</script>

</body>

</html>