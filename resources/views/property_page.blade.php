
@extends('template')
@section('title')
RE/MAX {{$property['data'][0]['listUrl']}}
@endsection
@section('css')
<link rel="stylesheet" href="http://remax.co.id:88/assets/css/owl.carousel.css" type="text/css">
@endsection
@section('js')
<script type="text/javascript" src="http://remax.co.id:88/assets/js/owl.carousel.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
$(document).ready(function () {
    $('.js-prop-carousel').owlCarousel({
        nav: true,
        navText: [
            "<i class='icon-chevron-left icon-white'><</i>",
            "<i class='icon-chevron-right icon-white'>></i>"
        ],
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        pagination: false,
        items: 1,
        loop: true,
        rewindSpeed: 500
    });
});
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
@endsection
@section('content')
<div id="page-property-content">
    <div class="wide_container_3 carousel-full-width">
        <div class="tabs">
            <div class="tab-content">
                <div id="tab1" class="tab active">
                    <div class="owl-prop-carousel js-prop-carousel">
                        @foreach ($property['data'][0]['links']['listFile'] as $element)
                        @foreach ($property['linked']['listFile'] as $element2)
                        @if ($element == $element2['fileId'])
                        <div class="owl-prop-item">
                            <div class="owl-prop-back" style="background-image:url(https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}});"></div>
                            <div class="owl-prop-img">
                                <img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}" alt="#">
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <div id="tab22" class="tab">
                    <!-- Map -->
                    <div id="map4"></div>
                    <!-- end Map -->
                </div>
            </div>
            <ul class="tab-links col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                <li class="active col-xs-6">
                    <a href="#tab1">
                        <img src="http://remax.co.id:88/assets/img/camera-black.png" alt=""/>Photo
                    </a>
                </li>
                <li class="col-xs-6">
                    <a href="#tab22" class="map4">
                        <img src="http://remax.co.id:88/assets/img/map.png" alt=""/>Map
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="wide-2" style="padding-bottom: 30px;">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('properties') }}">
                        Property
                    </a>
                </li>
                <li class="active">
                    {{$property['data'][0]['listTitle']}}
                </li>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <aside class="pr-summary col-md-4 col-xs-12">
                    <form action="agent_profile.html">
                        <div class="col-lg-7 col-md-6 col-sm-3 col-xs-6 hl-bl">
                            <h2>
                                @if ($property['data'][0]['listListingPrice'] >= 100000000000)
                                Rp. {{$property['data'][0]['listListingPrice']/1000000000000}} T
                                @elseif($property['data'][0]['listListingPrice'] >= 1000000000)
                                Rp. {{$property['data'][0]['listListingPrice']/1000000000}} M
                                @else
                                Rp. {{$property['data'][0]['listListingPrice']/1000000}} JT
                                @endif
                            </h2>
                            <h5 class="team-color">
                                FOR {{$property['linked']['listListingCategoryId'][0]['lsclName']}}
                            </h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-6 cat-img">
                                        <img src="http://remax.co.id:88/assets/img/bedroom.png" alt="#">
                                        <p>{{$property['data'][0]['listBedroom']}} Bedrooms</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-6 cat-img cat-img">
                                        <img src="http://remax.co.id:88/assets/img/bathroom.png" alt="#">
                                        <p>{{$property['data'][0]['listBathroom']}} Bathroom</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-xs-6 cat-img">
                                                <img src="http://remax.co.id:88/assets/img/square.png" alt="">
                                                <p class="info_line">{{$property['data'][0]['listBuildingSize']}} m<span class="rank">2</span></p>
                                            </div>
                                            <div class="col-lg-5 col-md-6 col-xs-6 cat-img">
                                                <img src="http://remax.co.id:88/assets/img/square.png" alt="">
                                                <p class="info_line">{{$property['data'][0]['listLandSize']}} m<span class="rank">2</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="full-width">
                            </div>
                        </div>
                        <div class="picker-block col-md-12 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="circle">
                                        <img src="http://remax.co.id:88/images/default.jpg" style="background-size:cover;" alt="#">
                                    </div>
                                    <div class="team-info">
                                        <h3>{{$property['linked']['listMmbsId'][0]['mmbsFirstName']}}</h3>
                                        <p class="team-color" style="color: #428bca;font-weight: 600">
                                            <span class="remax-red">
                                                RE<span class="remax-blue">/</span>MAX
                                            </span> 
                                            {{$property['linked']['listOfficeId'][0]['frofOfficeName']}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <span class="ffs-bs">
                                    <button type="submit" class="btn btn-large btn-primary">contact agent</button>
                                </span>
                                <div class="row col-xs-12">
                                    <div class="col-sm-4" style="text-align: center;">
                                        <!--facebook share-->
                                        <div class="fb-share-button" 
                                             data-href="https://developers.facebook.com/docs/plugins/" 
                                             data-layout="button" data-size="small" data-mobile-iframe="true">
                                            <a class="fb-xfbml-parse-ignore" 
                                               target="_blank" 
                                               href="#">
                                                Share
                                            </a>
                                        </div>
                                        <!--end facebook share-->
                                    </div>

                                    <div class="col-sm-4" style="text-align: center;">
                                        <!--twitter share-->
                                        <a href="https://twitter.com/share" 
                                           class="twitter-share-button" 
                                           data-show-count="false">
                                            Tweet
                                        </a>
                                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                        <!--end twitter share-->
                                    </div>
                                    <div class="col-sm-4" style="text-align: center;">
                                        <!--google plus share-->
                                        <!-- Place this tag where you want the share button to render. -->
                                        <div class="g-plus" data-action="share" data-annotation="none"></div
                                        <!--end google plus share-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </aside>
                <div class="pr-info col-md-8 col-xs-12">
                    <h2>{{$property['data']['0']['listTitle']}}</h2>
                    <div class="map-marker"></div>
                    <h5 class="team-color">{{$property['data']['0']['listStreetName']}} , {{$property['linked']['listCityId'][0]['mctyDescription']}}, {{$property['linked']['listProvinceId'][0]['mprvDescription']}}</h5>
                    <p>{{$property['data']['0']['listTitle']}}</p>
                </div>
                <div class="pr-info col-md-8 col-xs-12">
                    <h3>Property Features:</h3>
                    <section class="block">
                        <ul class="submit-features">
                            @if ($property['linked']['listFacility'] != null)
                            <li class="col-md-4 col-xs-4">
                                <div>Air conditioning</div>
                            </li>
                            <li class="col-md-4 col-xs-4 nonexistent">
                                <div class="team-color">Hi-Fi</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Balcony</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Balcony</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Internet</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Beach</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Bedding</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Iron</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Bedding</div>
                            </li>
                            <li class="col-md-4 col-xs-4 nonexistent">
                                <div class="team-color">Coffee pot</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Parquet</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Balcony</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Balcony</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Balcony</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Bedding</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Bedding</div>
                            </li>
                            <li class="col-md-4 col-xs-4">
                                <div>Bedding</div>
                            </li>
                            @else
                            <li class="col-md-4 col-xs-4 nonexistent">
                                <div class="team-color">No Features</div>
                            </li>
                            @endif
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="wide_container_3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 center">
                    <h3 style="text-align: center; color: rgb(58, 125, 227);"> Ada pertanyaan tentang property ini ?</h3>
                    <h2 style="text-align: center; color: rgb(222, 25, 34);"><strong> Saya siap membantu </strong></h2>
                    <br> 
                    <form action="#" method="POST">
                        <input name="_token" value="acvFCwNoRiftRh430OWw7U9tT6fb6GleSiW8ZPYl" type="hidden"> 
                        <div class="wide-inner row">
                            <div class="col-md-6" style="padding-left: 0px;"><input name="name" placeholder="name ..." required="required" class="form-control" type="text"> <input name="email" placeholder="Email Adress ..." required="required" class="form-control" type="text"> <input name="phone" placeholder="Phone Number ..." required="required" class="form-control" type="text"></div>
                            <div class="col-md-6 col-xs-6" style="padding-right: 15px; padding-left: 0px; width: 50%; float: right;"><textarea name="message" class="form-control" style="height: 130px; width: 100%; margin-bottom: 10px;"></textarea></div>
                            <div class="col-md-12 col-xs-12" style="padding-left: 0px;"><button class="btn btn-primary btn-block">Send Message</button></div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-xs-12 some-prp" style="height: 400px; overflow-y: scroll;">
                    <h4>Property may you like:</h4>
                    <hr>
                    @foreach ($propertySuggest['data'] as $key => $suggest)
                    @php
                    $img0 = $suggest['links']['listFile'][0];
                    @endphp
                    <div class="property-block-small">
                        <a href="property_page.html">
                            @foreach ($propertySuggest['linked']['listFile'] as $linkImg)
                            @if ($linkImg['fileId'] == $img0)
                            <div class="property-image-small" style="background-image: url(&quot;https://www.remax.co.id/prodigy/papi/{{$linkImg['filePreview']}}&quot;);"></div>
                            @endif
                            @endforeach
                            <h3>{{$suggest['listTitle']}}</h3>
                            <p class="team-color">{{$suggest['listStreetName']}}</p>
                            <h4>
                                @if ($suggest['listListingPrice'] >= 100000000000)
                                Rp. {{$suggest['listListingPrice']/1000000000000}} T
                                @elseif($suggest['listListingPrice'] >= 1000000000)
                                Rp. {{$suggest['listListingPrice']/1000000000}} M
                                @else
                                Rp. {{$suggest['listListingPrice']/1000000}} JT
                                @endif
                            </h4>
                        </a>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection