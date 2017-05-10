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

<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=293151397519359";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

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
        <div class="image-news"
             style="background-image: url({{ asset('images/backgroundPage/news.jpg') }})">

            <div class="caption" style="top:40%">
                <span class="border"> RE/MAX News </span>
            </div>

        </div>

        <div class="container-article">

            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="">News</li>
            </ol>
            
            <div id="main" class="row">
                <div class="content-news row" style="margin-bottom: 40px;">

                    @foreach($body->data as $data)
                        <a href="{{ url('news',$data->id) }}">
                            <article class="article-news">
                                <div class="article-inner">
                                    @if($data->links->wbneFileId != null)
                                        @foreach($body->linked->wbneFileId as $linked)

                                            @if($data->links->wbneFileId == $linked->id)
                                                <div class="article-image">
                                                    <div class="image"
                                                         style="background-image: url({{ $uri.$linked->filePreview }})"></div>
                                                </div>
                                            @endif

                                        @endforeach

                                    @else
                                        <div class="article-image">
                                            <div class="image"
                                                 style="background-image: url({{ asset('images/Not_available.png') }})"></div>
                                        </div>
                                    @endif

                                    <div class="article-content">
                                        <div class="article-wrapper">
                                            <div>
                                                <span class="news-date">{{ Carbon\Carbon::parse($data->wbnlCreatedTime)->format('D')  }}
                                                    , {{ $data->wbnlCreatedTime }}</span>
                                            </div>
                                            <a href="{{ url('news.detail',$data->id) }}"><h2
                                                        class="article-title">{{ $data->wbnlTitle }}</h2></a>
                                        </div>
                                        <div>
                                            <span class="news-created">{{ $data->wbnlCreatedUserId }}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                    @endforeach

                </div>
                <div class="sidebar-facebook">
                    <aside id="sidebar-news">
                        <div class="block-news">

                            <div class="fb-page" data-href="https://www.facebook.com/remaxindo/" data-tabs="timeline"
                                 data-width="280" data-small-header="true" data-adapt-container-width="true"
                                 data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/remaxindo/" class="fb-xfbml-parse-ignore"><a
                                            href="https://www.facebook.com/remaxindo/">REMAX Indonesia</a></blockquote>
                            </div>

                        </div>
                    </aside>

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
<!-- 
<script>
    $('.article-news').readmore({
        collapsedHeight: 300
    });
</script> -->

</body>

</html>