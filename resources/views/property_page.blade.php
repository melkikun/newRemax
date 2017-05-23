
@extends('template')
@section('title')
{{-- expr --}}
@endsection
@section('css')
<link rel="stylesheet" href="http://remax.co.id:88/assets/css/owl.carousel.css" type="text/css">
@endsection
@section('js')
<script type="text/javascript" src="http://remax.co.id:88/assets/js/owl.carousel.min.js"></script>
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
</script>
@endsection
@section('content')
<div id="page-property-content">
    <div class="wide_container_3 carousel-full-width">
        <div class="tabs">
            <div class="tab-content">
                <div id="tab1" class="tab active">
                    <div class="owl-prop-carousel js-prop-carousel">
                        <div class="owl-prop-item">
                            <div class="owl-prop-back"
                                 style="background-image:url(https://www.remax.co.id/prodigy/papi/Listing/crud/25/links/ListingFile/110);"></div>
                            <div class="owl-prop-img">
                                <img src="https://www.remax.co.id/prodigy/papi/Listing/crud/25/links/ListingFile/110"
                                     alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <div id="tab22" class="tab">
                    <!-- Map -->
                    <div id="map4"></div>
                    <!-- end Map -->
                </div>
            </div>

            <ul class="tab-links col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                <li class="active col-xs-6"><a href="#tab1"><img src="http://remax.co.id:88/assets/img/camera-black.png"
                                                                 alt=""/>Photo</a></li>
                <li class="col-xs-6"><a href="#tab22" class="map4"><img src="http://remax.co.id:88/assets/img/map.png"
                                                                        alt=""/>Map</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="wide-2">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="http://remax.co.id:88">Home</a></li>
                <li><a href="http://remax.co.id:88/properties">Property</a></li>
                <li class="active">Rumah baru tanah abang</li>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <aside class="pr-summary col-md-4 col-xs-12">
                    <form action="#">
                        <div class="col-lg-7 col-md-6 col-sm-3 col-xs-6 hl-bl">
                            <div class="price-property">Rp. 2 M</div>
                            <label class="badge">For Sell</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 col-xs-6 cat-img">
                                        <img src="http://remax.co.id:88/assets/img/bedroom.png" alt="">
                                        <p>5 Bedrooms</p>
                                    </div>
                                    <div class="col-lg-7 col-md-6 col-xs-6 cat-img cat-img">
                                        <img src="http://remax.co.id:88/assets/img/bathroom.png" alt="">
                                        <p>9 Bathroom</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6 col-xs-6 cat-img">
                                                <img src="http://remax.co.id:88/assets/img/square.png" alt="">
                                                <p class="info_line">- m<span class="rank">2</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="col-lg-5 col-md-6 col-xs-6 line"></div>
                                                <div class="col-lg-5 col-md-6 col-xs-6 line"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="full-width">
                            </div>
                        </div>
                        <div class="picker-block col-md-12 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class=" col-xs-12" style="padding-left:0;">
                                    <div class="circle">
                                        <img src="http://remax.co.id:88/images/default.jpg" style="background-size:cover;"
                                             alt="">
                                    </div>
                                    <div class="team-info">
                                        <h3 id="agent-name">Maria</h3>

                                        <p class="team-color" style="color: #428bca;font-weight: 600"><span
                                                class="remax-red">RE<span
                                                    class="remax-blue">/</span>MAX</span> Ventura
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="ffs-bs">
                                <button class="btn btn-primary" @click="onHandle">{{ "contact" }}</button>
                                <li class="list-group-item" v-show="flag"><i class="fa fa-envelope"></i>&nbsp;Email
                                    : maria.catering@yahoo.com</li>
                                <li class="list-group-item" v-show="flag"><i class="fa fa-phone"></i>&nbsp;Phone
                                    Number
                                    : 08756542333
                                </li>
                            </div>
                        </div>
                    </div>

                    <div class="fb-share-button" data-size="large"
                         data-href="http://remax.co.id:88/property/Rumah_baru_tanah_abang"></div>

                    <a href="https://twitter.com/share" class="twitter-share-button"
                       data-show-count="false" data-text="Rumah baru bangun tanah abang"
                       data-hashtags="REMAX">Tweet</a>


                    <div class="g-plus" data-action="share" data-annotation="none"></div>


                </aside>
                <div class="pr-info col-md-8 col-xs-12">
                    <h2>Rumah baru tanah abang</h2>

                    <div class="map-marker"></div>
                    <h5 class="team-color">Jakarta Pusat
                        , tanah abang</h5>

                    <p>Rumah baru bangun tanah abang</p>
                </div>

                <div class="pr-info col-md-8 col-xs-12">
                    <h3>Property Features:</h3>

                    <section class="block">
                        <ul class="submit-features">
                            <span> coming soon </span>
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
                    <h3 style="text-align: center;color:#3A7DE3;"> Ada pertanyaan tentang property ini ?</h3>

                    <h2 style="text-align: center;color:#DE1922;"><strong> Saya siap membantu </strong></h2>
                    <br>

                    <form action="#" method="POST">
                        <input type="hidden" name="_token" value="IWvA2vDbWhEO7hrvgzDzGLtvcTVgS08adGbZCuav">
                        <div class="wide-inner row">
                            <div class="col-md-6" style="padding-left: 0;">
                                <input v-model="inquiry.name" name="name" class="form-control" type="text"
                                       placeholder="name ..." required>
                                <input v-model="inquiry.email" name="email" class="form-control" type="text"
                                       placeholder="Email Adress ..." required>
                                <input v-model="inquiry.phone" name="phone" class="form-control" type="text"
                                       placeholder="Phone Number ..." required>
                            </div>
                            <div class="col-md-6 col-xs-6"
                                 style="padding-right:15px;padding-left: 0;width: 50%;float: right;">
                                <textarea v-model="inquiry.message" name="message" class="form-control"
                                          style="height:130px;width: 100%;margin-bottom: 10px;"> </textarea>
                            </div>
                            <div class="col-md-12 col-xs-12" style="padding-left:0">
                                <button class="btn btn-primary btn-block">Send Message</button>
                            </div>
                        </div>
                    </form>

                </div>


                <div class="col-md-4 col-xs-12 some-prp" style="height: 320px;overflow-y: scroll;">
                    <h4 style="color: black">Listing kantor <span class="remax-red">RE<span
                                class="remax-blue">/</span>MAX</span>  Ventura
                    </h4>
                    <hr>
                    <div class="property-block-small">
                        <a href="http://remax.co.id:88/property/Rumah_baru_tanah_abang">


                            <div class="property-image-small"
                                 style="background-image: url(https://www.remax.co.id/prodigy/papi/Listing/crud/25/links/ListingFile/110) "></div>




                            <h3>Rumah baru tanah abang</h3>

                            <p class="team-color">tanah abang</p>

                            <h4>
                                Rp. 2 M                                    </h4>
                        </a>
                        <hr>
                    </div>
                    <div class="property-block-small">
                        <a href="http://remax.co.id:88/property/Rumah_Golden_Palm">




                            <div class="property-image-small"
                                 style="background-image: url(https://www.remax.co.id/prodigy/papi/Listing/crud/26/links/ListingFile/111) "></div>


                            <h3>Rumah Golden Palm</h3>

                            <p class="team-color">Golden Palm</p>

                            <h4>
                                Rp. 1.5 M                                    </h4>
                        </a>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection