<!DOCTYPE html>

<html lang="en-US">
<head>

    <title>Property Page</title>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:url" content="{{ route('property.show',$body->data->listUrl) }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $body->data->listTitle }}"/>
    <meta property="og:description" content="{{ $body->data->listDescription }} }}"/>
    <meta property="og:image" content="{{ $body->linked->listFile[0]->filePreview }}"/>


    <link href="{{ asset('assets/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/selectize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/customsas.css') }}" type="text/css">

</head>

<body class="page-property" id="page-top">

<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1243959699053772',
            xfbml: true,
            version: 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


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
    <div id="page-property-content">
        <div class="wide_container_3 carousel-full-width">
            <div class="tabs">
                <div class="tab-content">
                    <div id="tab1" class="tab active">
                        <div class="owl-prop-carousel js-prop-carousel">
                            @if($body->linked->listFile == null)
                                <div class="owl-prop-item">
                                    <div class="owl-prop-back"
                                         style="background-image:url({{ asset('images/Not_available.png') }});"></div>
                                    <div class="owl-prop-img">
                                        <img src="{{ asset('images/Not_available.png') }}"
                                             alt="">
                                    </div>
                                </div>
                            @else
                                @foreach($body->linked->listFile as $data)
                                    <div class="owl-prop-item">
                                        <div class="owl-prop-back"
                                             style="background-image:url({{ $uri.$data->filePreview }});"></div>
                                        <div class="owl-prop-img">
                                            <img src="{{ $uri.$data->filePreview }}"
                                                 alt="">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div id="tab22" class="tab">
                        <!-- Map -->
                        <div id="map4"></div>
                        <!-- end Map -->
                    </div>
                </div>

                <ul class="tab-links col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                    <li class="active col-xs-6"><a href="#tab1"><img src="{{ asset('assets/img/camera-black.png') }}"
                                                                     alt=""/>Photo</a></li>
                    <li class="col-xs-6"><a href="#tab22" class="map4"><img src="{{ asset('assets/img/map.png') }}"
                                                                            alt=""/>Map</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="wide-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('properties') }}">Property</a></li>
                    <li class="active">{{ $body->data->listTitle }}</li>
                </ol>
            </div>
            <div class="container">
                <div class="row">
                    <aside class="pr-summary col-md-4 col-xs-12">
                        <form action="#">
                            <div class="col-lg-7 col-md-6 col-sm-3 col-xs-6 hl-bl">
                                <div class="price-property"><?php
                                    $rp = $body->data->listListingPrice;
                                    $rp = (0 + str_replace(",", "", $rp));

                                    if ($rp >= 1000000000) {
                                        $rp = round(($rp / 1000000000), 3);
                                        echo 'Rp.' . ' ' . $rp . ' M';
                                    } else {
                                        $rp = round(($rp / 1000000), 0);
                                        echo 'Rp.' . ' ' . $rp . ' Jt';
                                    }
                                    ?></div>
                                <label class="badge">For {{ $body->linked->listListingCategoryId->lsclName }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 col-xs-6 cat-img">
                                            <img src="{{ asset('assets/img/bedroom.png') }}" alt="">
                                            @if(is_null($body->data->listBedroom))
                                                <p> - Bedrooms</p>
                                            @else
                                                <p>{{ $body->data->listBedroom }} Bedrooms</p>
                                            @endif
                                        </div>
                                        <div class="col-lg-7 col-md-6 col-xs-6 cat-img cat-img">
                                            <img src="{{ asset('assets/img/bathroom.png') }}" alt="">
                                            @if(is_null($body->data->listBathroom))
                                                <p> - Bathrooms</p>
                                            @else
                                                <p>{{ $body->data->listBathroom }} Bathroom</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6 col-xs-6 cat-img">
                                                    <img src="{{ asset('assets/img/square.png') }}" alt="">
                                                    @if(is_null($body->data->listBuildingSize))
                                                        <p class="info_line">- m<span class="rank">2</span></p>
                                                    @else
                                                        <p class="info_line">{{$body->data->listBuildingSize}} m<span
                                                                    class="rank">2</span></p>
                                                    @endif
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
                                            <img src="{{ asset('images/default.jpg') }}" style="background-size:cover;"
                                                 alt="">
                                        </div>
                                        <div class="team-info">
                                            <h3 id="agent-name">{{$body->linked->listMmbsId->mmbsFirstName}}</h3>

                                            <p class="team-color" style="color: #428bca;font-weight: 600">
                                                <span class="remax-red">
                                                    RE<span class="remax-blue">/</span>MAX
                                                </span>{{ $body->linked->listOfficeId->frofOfficeName}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12" style="margin-bottom: 5px;">
                                <div class="ffs-bs">
                                    <button class="btn btn-primary" @click="onHandle">@{{ contact }}</button>
                                    <li class="list-group-item" v-show="flag"><i class="fa fa-envelope"></i>&nbsp;Email
                                        : {{ $membership->data->mmbsEmail ? $membership->data->mmbsEmail : '-'  }}</li>
                                    <li class="list-group-item" v-show="flag"><i class="fa fa-phone"></i>&nbsp;Phone
                                        Number
                                        : {{ $membership->data->mmbsCellPhone1 ? $membership->data->mmbsCellPhone1 : '-' }}
                                    </li>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="fb-share-button" data-size="large"
                             data-href="{{ route('property.show',$body->data->listUrl) }}"></div>

                        <a href="https://twitter.com/share" class="twitter-share-button"
                           data-show-count="false" data-text="{{ $body->data->listDescription }}"
                           data-hashtags="REMAX">Tweet</a> -->



                        <div class="share-news">
                            <ul>
                                <li>SHARE</li>
                                <li><a href="http://www.facebook.com/share.php?u={{ route('property.show',$body->data->id) }}&title={{ $body->data->listDescription }}"><img src="{{ asset('assets/img/remax-fb.png') }}" alt=""></a></li>
                                <li><a href="http://www.linkedin.com/shareArticle?mini=true&url={{ route('property.show',$body->data->id) }}&title={{ $body->data->listTitle }}"><img src="{{ asset('assets/img/remax-in.png') }}" alt=""></a></li>
                                <li><a href="http://twitter.com/home?status={{ $body->data->listTitle }}+{{ route('property.show',$body->data->id) }}"><img src="{{ asset('assets/img/remax-tw.png') }}" alt=""></a></li>
                                <li><a href="https://plus.google.com/share?url={{ route('property.show',$body->data->id) }}"><img src="{{ asset('assets/img/remax-gp.png') }}" alt=""></a></li>
                            </ul>
                        </div>

                    </aside>
                    <div class="pr-info col-md-8 col-xs-12">
                        <h2>{{ $body->data->listTitle }}</h2>

                        <div class="map-marker"></div>
                        <h5 class="team-color">{{ $body->linked->listCityId->mctyDescription }}
                            , {{ $body->data->listStreetName }}</h5>

                        <p>{{ $body->data->listDescription }}</p>
                    </div>

                    <div class="pr-info col-md-8 col-xs-12">
                        <h3>Property Features:</h3>

                        <section class="block">
                            <ul class="submit-features">
                                @if($body->data->links->listFacility == null)
                                    <span> coming soon </span>
                                @else
                                    @foreach($body->linked->listFacility as $facility)
                                        <li class="col-md-4 col-xs-4">
                                            <div>{{$facility->fctlName }}</div>
                                        </li>
                                    @endforeach
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
                        <h3 style="text-align: center;color:#3A7DE3;"> Ada pertanyaan tentang property ini ?</h3>

                        <h2 style="text-align: center;color:#DE1922;"><strong> Saya siap membantu </strong></h2>
                        <br>


                        <div class="wide-inner row">
                            {{ csrf_field() }}
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
                                <button class="btn btn-primary btn-block" @click="postInquiry">Send Message</button>
                            </div>
                        </div>


                    </div>


                    <div class="col-md-4 col-xs-12 some-prp" style="height: 320px;overflow-y: scroll;">
                        <h4 style="color: black">Listing kantor <span class="remax-red">RE<span
                                        class="remax-blue">/</span>MAX</span> {{ $body->linked->listOfficeId->frofOfficeName }}
                        </h4>
                        <hr>
                        @foreach($office->data as $off)
                            <div class="property-block-small">
                                <a href="{{ route('property.show',$off->listUrl) }}">

                                    @foreach($office->linked->listFile as $file)

                                        @if($off->links->listFile[0] == $file->id)
                                            <div class="property-image-small"
                                                 style="background-image: url({{ $uri.$file->filePreview }}) "></div>
                                        @elseif($off->links->listFile[0] == null)
                                            <div class="property-image-small"
                                                 style="background-image: url({{ asset('images/Not_available.png') }}) "></div>
                                        @endif

                                    @endforeach

                                    <h3>{{ $off->listTitle }}</h3>

                                    <p class="team-color">{{ $off->listStreetName }}</p>

                                    <h4>
                                        <?php
                                        $rp = $off->listListingPrice;
                                        $rp = (0 + str_replace(",", "", $rp));
                                        if ($rp >= 1000000000) {
                                            $rp = round(($rp / 1000000000), 3);
                                            echo 'Rp.' . ' ' . $rp . ' M';
                                        } else {
                                            $rp = round(($rp / 1000000), 0);
                                            echo 'Rp.' . ' ' . $rp . ' Jt';
                                        }
                                        ?>
                                    </h4>
                                </a>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Page Content -->

    <!-- Start Footer -->
    <div id="footer">@include('layout.footer')</div>
    <!-- End Footer -->
</div>


<!-- Use this code below only if you are using google street view -->
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initialize&libraries=places"></script> -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6Pwo89NTFbXWEtrcEsL14M6af-gSjfQ&libraries=places"></script>
<script src="{{ asset('js/vue.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
{{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>--}}
<script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/markerwithlabel_packed.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.raty.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom-map.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/ie.js') }}"></script>

<![endif]-->

{{--<script>--}}
{{--FB.ui({--}}
{{--method: 'share',--}}
{{--mobile_iframe: true,--}}
{{--href: 'digikomdev.com/remaxmockup/search'--}}
{{--}, function(response){});--}}
{{--</script>--}}

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


<script>

    var propertyDetail = new Vue({
        el: '#page-property-content',
        data: {
            flag: false,
            flgEmail: false,
            inquiry: {
                name: '',
                phone: '',
                status: '',
                email: '',
                message: ''
            },
            idListing: {{ $body->data->id }}


        },

        methods: {
            onHandle: function () {
                this.flag = !this.flag;
            },

            postInquiry: function () {
                var vm = this;

                axios.post('https://www.remax.co.id/prodigy/papi/webinquiry/crud',
                        {
                            "wbinCustomerName": vm.inquiry.name,
                            "wbinCustomerEmail": vm.inquiry.email,
                            "wbinCustomerPhone": vm.inquiry.phone,
                            "wbinCustomerNote": vm.inquiry.message,
                            "links": {
                                "wbinType": 1,
                                "wbinListing": vm.idListing

                            }

                        })
                        .then(function (response) {
                            console.log(response)
                        })
                        .catch(function (error) {
                            console.log(error)
                        })

            }

        },

        computed: {
            phoneBtn: function () {
                if (this.flag == false) {
                    return 'Contact Agent';
                }
            }
            ,

            contact: function () {
                if (this.flag == false) {
                    return 'Show Contact';
                } else {
                    return 'Hide Contact';
                }
            }
            ,
            emailBtn: function () {
                if (this.flag == false) {
                    return 'Contact Agent';
                }
            }
        }
    });
</script>


<script>


    var cor = <?php echo $body->data->listCoordinat;?>
    //Google map for property page
            function initialize() {
                var latitude = this.cor.coordinate.latitude;
                var longitude = this.cor.coordinate.longitude;

                var latlng = {lat: latitude, lng: longitude};
                var mapOptions = {
                    center: latlng,
                    zoom: 15
                };

                var map = new google.maps.Map(document.getElementById('map4'),
                        mapOptions);

                var marker = new MarkerWithLabel({
                    position: latlng,
                    map: map,
                    labelContent: '<div class="marker-loaded"><div class="map-marker"><img src="{{ asset('images/map_marker.png') }}" alt="" /></div></div>',
                    labelClass: "marker-style"
                });

                var contentString =
                        '<h4 class="firstHeading">{{ $body->data->listTitle }}</h4>' +
                        '<h6"> {{ $body->linked->listCityId->mctyDescription }}, {{ $body->data->listStreetName }} </h6>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                marker.addListener('click', function () {
                    infowindow.open(map, marker);
                });

                //resize for opeening and to get center of map
                $('.map4').bind('click', function () {
                    google.maps.event.trigger(map4, 'resize');
                    map.panTo(marker.getPosition());
                });

            };

    google.maps.event.addDomListener(window, 'load', initialize);

</script>


</body>
</html>