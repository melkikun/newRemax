@extends('template')
@section('title')
    {{-- expr --}}
@endsection
@section('css')
    <style type="text/css">
        
.blog-text {
    padding-left: 15px;
    text-align: justify;
}
.content-article {
    text-align: justify;
}

.sidebar-social-media > li > a > img {
    width: 40px !important;
}
.sidebar-social-media li {
    cursor: pointer;
    display: inline-block;
    margin-bottom: 0;
    margin-right: 0;
    min-width: 50px;
    padding: 0 10px;
    text-align: center;
    transform: translateZ(0px);
    transition-duration: 0.3s;
    transition-property: transform;
    transition-timing-function: ease-out;
}
.mrgb3x {
    margin-bottom: 0;
}
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('news') }}">News</a></li>
                <li class="active">
                    <a href="#">
                        @if ($detail['data'] != null)
                        {{$detail['data']['wbnlTitle'][Session::get('lang')]}}
                        @else
                        --
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 blog-singlepost">
                <div class="blog-section mrgb9x clearfix animated out" data-delay="0" data-animation="fadeInUp">
                    @if ($detail['data'] != null)
                    <div class="blog-text"> 
                        <span>
                            @if (Session::get('lang')=="en")
                            POSTED ON : {{date('D, d F Y',strtotime($detail['data']['wbnlCreatedTime'][Session::get('lang')]))}}
                            @else
                            DIPOSTING PADA: {{date('D, d F Y',strtotime($detail['data']['wbnlCreatedTime'][Session::get('lang')]))}}
                            @endif                      
                        </span>
                        <h4>{{$detail['data']['wbnlTitle'][Session::get('lang')]}}</h4>
                        <span class="post-detail">
                            @if (Session::get('lang')=="en")
                            BY: 
                            @else
                            OLEH: 
                            @endif
                            {!!$detail['data']['wbnlCreatedUserId'][Session::get('lang')]!!}
                        </span>
                        <div class="blogsingle-img"> 
                            <img src="https://www.remax.co.id/prodigy/papi/{{$detail['linked']['wbneFileId']['filePreview']}}?size=600,500" class="img-responsive" alt="#" /> 
                        </div>
                        <div class="content-article">
                            {!!$detail['data']['wbnlContent'][Session::get('lang')]!!}
                        </div>
                    </div>
                    @else
                    false expr
                    @endif

                </div>
            </div>
            <div class="col-md-3">
                <div class="right-side-bar">
                    <div class="facebook-feed mrgt6x animated out" data-delay="0" data-animation="fadeInUp">
                        <div class="follow-on mrgt6x animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="rightbar-heading mrgb3x">
                                <h4>SHARE ON</h4>
                            </div>
                            <ul class="sidebar-social-media">
                                <li>
                                    <a href="http://www.facebook.com/share.php?u={{ url('news') }}/{{ $detail['data']['id'] }}">
                                        <img src="http://remax.co.id:88/assets/img/remax-fb.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('news') }}/{{ $detail['data']['id'] }}&amp;title={{$detail['data']['wbnlTitle']['en']}}">
                                        <img src="http://remax.co.id:88/assets/img/remax-in.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://twitter.com/home?status={{$detail['data']['wbnlTitle']['en']}}+{{ url('news') }}/{{ $detail['data']['id'] }}">
                                        <img src="http://remax.co.id:88/assets/img/remax-tw.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/share?url={{ url('news') }}/{{ $detail['data']['id'] }}">
                                        <img src="http://remax.co.id:88/assets/img/remax-gp.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div id="fb-root"></div>
                    <div class="fb-page" data-href="https://www.facebook.com/remaxindo/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/remaxindo/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/remaxindo/">REMAX Indonesia</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection