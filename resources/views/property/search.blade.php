<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.slider.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/selectize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">

    <title>Search Property</title>
</head>

<body class="page-search" id="page-top">
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
    <div id="page-content-search">
        <div class="container">
            <div class="wide_container_2" style="margin-left:0;margin-right:0;">
                <div class="tabs">
                    <header class="col-md-7 col-xs-12 no-pad">

                        <div class="location-map col-sm-4 col-xs-4">
                            <div class="input-group">
                                <form action="">
                                    <input type="text" class="form-control" id="" name="buySearch"
                                           placeholder="where do you want to live .. ?" value="">
                                    <button type="submit"><i class="fa fa-search"> </i></button>
                                </form>
                            </div>
                        </div>
                        <div class="select-block col-sm-2 col-xs-2">
                            <form action="{{ route('search') }}">
                                <select class="selection" name="filterBed">
                                    <option>Beds</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </form>
                        </div>
                        <div class="select-block col-sm-2 col-xs-2 ">
                            <select class="selection">
                                <option>Type</option>
                                <option>For Sale</option>
                                <option>For Rent</option>
                            </select>
                        </div>
                        <div class="select-block col-md-3 col-xs-4 last">
                            <a class="options-button" id="toggle-link">More Filters</a>
                        </div>
                        <div class="options-overlay col-md-offset-4 col-sm-offset-5 col-sm-7" id="hidden_content"
                             style="display: none;">
                            <div class="row">
                                <div class="col-xs-6 top-mrg">
                                    <div class="internal-container features">
                                        <div class="form-group">
                                            <label>Minimum Square Footage:</label>
                                            <input type="text" class="form-control" placeholder="Enter an Amount">
                                        </div>
                                        <label>Building Features:</label>
                                        <section class="block">
                                            <section>
                                                <ul class="submit-features">
                                                    <li>
                                                        <div class="checkbox"><label><input
                                                                        type="checkbox">Elevator</label></div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox">Gym</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox">Pool</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox">Lorem Ipsum</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </section>
                                        </section>
                                    </div>
                                </div>
                                <div class="col-xs-6 top-mrg">
                                    <div class="internal-container features">
                                        <label>Property Features:</label>
                                        <section class="block">
                                            <section>
                                                <ul class="submit-features">
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox">Air
                                                                conditioning</label></div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox"><label><input
                                                                        type="checkbox">Balcony</label></div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox">Garage
                                                                Internet</label></div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox"><label><input
                                                                        type="checkbox">Dishwasher</label></div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox">Washer
                                                                Mashine</label></div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox">Some Lorem
                                                                Ipsum</label></div>
                                                    </li>
                                                </ul>
                                            </section>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div><!-- options-overlay -->
                    </header><!-- end header -->
                    <ul class="tab-links col-md-5 col-xs-12">
                        <li class="col-lg-6 col-md-6 col-xs-6 no-pad active"><a href="#tab1"
                                                                                                class="map2"><img
                                        src="{{ asset('assets/img/map.png') }}" alt=""/>Map</a></li>
                        <li class="col-lg-6 col-md-6 col-xs-6 no-pad"><a href="#tab2"><img
                                        src="{{ asset('assets/img/grid.png') }}"
                                        alt=""/>Grig</a></li>
                    </ul>
                    <!-- tab-links -->
                    <div class="tab-content">
                        <div id="tab1" class="tab" style="display: block;">
                            <div class="sidebar col-sm-5 col-xs-12">
                                <!-- Map -->
                                <div id="map"></div>
                                <!-- end Map -->
                            </div><!-- sidebar -->
                            <div class="content col-sm-7 col-xs-12">
                                <!-- Range slider -->
                                <div class="col-xs-12">
                                    <div class="row">
                                        <form method="post">
                                            <div class="col-md-3 col-sm-4">
                                                <div class="form-inline">
                                                    <label class="top-indent">Price Range:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-8">
                                                <div class="form-group">
                                                    <div class="price-range price-range-wrapper">
                                                        <input class="price-input" type="text" name="price"
                                                               value="0;5570000000">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- row -->
                                </div>    <!-- explore_grid -->
                                <!-- End Range slider -->

                                <div class="wide-2">
                                    <div class="col-xs-12" id="property-search">
                                        <div class="row m0">
                                            <?php $root = 'https://www.remax.co.id/papi/';
                                            $defaultImg = 'http://www.thatpetplace.com/c.1043140/site/img/photo_na.jpg';
                                            ?>

                                            @foreach($search->data as $data)
                                                <div class="search-map-wrap">
                                                    <div class="house-card buy">
                                                        <a href="{{ route('property.show',$data->id) }}">
                                                            <div class="image-wrap"
                                                                 @foreach($linked->listFile as $image)
                                                                 @if($image->id == $data->links->listFile[0])
                                                                 style="background-image:url({{$root.$image->filePreview}})">
                                                                 @endif
                                                                @endforeach

                                                                @if(is_null($data->links->listFile[0]))
                                                                    style="background-image:url({{$defaultImg}})">
                                                                @endif
                                                                <label>DIJUAL</label>
                                                            </div>
                                                        </a>

                                                        <div class="content-wrap">
                                                            <a href="{{ route('property.show',$data->id) }}">
                                                                <div class="title"
                                                                     title="Apartemen Tower D Waterplace">
                                                                    {{ $data->listTitle }}
                                                                </div>
                                                            </a>

                                                            <div class="price">
                                                                <?php
                                                                $rp = $data->listListingPrice;
                                                                $rp = (0 + str_replace(",", "", $rp));

                                                                if ($rp > 1000000000) {
                                                                    $rp = round(($rp / 1000000000), 3);
                                                                    echo 'Rp.' . ' ' . $rp . ' M';
                                                                } else {
                                                                    $rp = round(($rp / 1000000), 0);
                                                                    echo 'Rp.' . ' ' . $rp . ' Jt';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="desc">{{ $data->listDescription }}
                                                            </div>
                                                            <div class="amenities">
                                                                <div class="row m0">
                                                                    <div class="w-70 pull-left">

                                                                        <div class="icon-text">
                                                                            <i class="fa fa-bed"></i>
                                                                            @if(is_null($data->listBedroom))
                                                                                <span> - </span>
                                                                            @else
                                                                                <span>{{ $data->listBedroom }}</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="icon-text">
                                                                            <i class="fa fa-shower"></i>
                                                                            @if(is_null($data->listBathroom))
                                                                                <span> - </span>
                                                                            @else
                                                                                <span>{{ $data->listBathroom }}</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="icon-text">
                                                                            <i class="fa fa-area-chart"></i>
                                                                            @if(is_null($data->listLandSize))
                                                                                <span> - m<span
                                                                                            class="rank">2</span> </span>
                                                                            @else
                                                                                <span>{{$data->listLandSize }}
                                                                                    m<span class="rank">2</span></span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-30 pull-right">
                                                                        <a href="{{ route('property.show',$data->id) }}"
                                                                           class="l-button">More Info</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="location row m0">
                                                                <i class="fa fa-map-marker"></i>

                                                                <div class="text">
                                                                        <span>
                                                                            @foreach($linked->listCityId as $city)
                                                                                @if($city->id == $data->links->listCityId)
                                                                                    {{ $city->mctyDescription }}
                                                                                @endif
                                                                            @endforeach
                                                                        </span>
                                                                    <span>{{ $data->listStreetName }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div><!-- end container -->
                                    <div class="col-xs-12 content_2 top-indent">
                                        <nav class="site-navigation paging-navigation navbar">
                                            <div class="nav-previous"><a href="#">PREV PAGE</a></div>
                                            <ul class="pagination pagination-lg">
                                                <li><a href="#">1</a></li>
                                                <li><span class="active">2</span></li>
                                                <li><a href="#">3</a></li>
                                                <li><span class="nav-dots">...</span></li>
                                                <li><a href="#">5</a></li>
                                            </ul>
                                            <div class="nav-next"><a href="#">NEXT PAGE</a></div>
                                        </nav>
                                    </div>
                                </div>    <!-- end wide-2 -->
                            </div>    <!-- content -->
                        </div>
                        <div id="tab2" class="tab">
                            <div class="col-xs-12 content_2">
                                <div class="col-md-10 col-md-offset-1">
                                    <!-- Range slider -->
                                    <div class="explore_grid">
                                        <div class="row">
                                            <div class="explore col-xs-12">
                                                <h2>Properties for rent</h2>
                                            </div>
                                            <form method="post">
                                                <div class="col-md-2 col-sm-3">
                                                    <div class="form-inline">
                                                        <label class="top-indent">Price Range:</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-sm-7">
                                                    <div class="form-group">
                                                        <div class="price-range price-range-wrapper"></div>
                                                    </div>
                                                </div>
                                                <div class="select-block no-border pull-right col-sm-2 col-xs-12">
                                                    <select class="selection">
                                                        <option>Sort By:</option>
                                                        <option>Date</option>
                                                        <option>Price</option>
                                                        <option>Type</option>
                                                    </select>
                                                </div>    <!-- select-block -->
                                            </form>
                                        </div><!-- row -->
                                    </div>
                                    <!-- End Range slider -->
                                    <div class="wide-2">
                                        <div class="col-xs-12">
                                            <div class="row m0">
                                                @foreach($search->data as $data)
                                                    <div class="search-map-wrap">
                                                        <div class="house-card rent">
                                                            <a href="{{ route('property.show',$data->id) }}">
                                                                <div class="image-wrap"
                                                                        @foreach($linked->listFile as $image)
                                                                            @if($image->id == $data->links->listFile[0])
                                                                                style="background-image:url({{$root.$image->filePreview}}
                                                                                )">
                                                                            @endif
                                                                        @endforeach

                                                                    @if(is_null($data->links->listFile[0]))
                                                                        style="background-image:url({{$defaultImg}})">
                                                                    @endif
                                                                    <label>DIJUAL</label>
                                                                </div>
                                                            </a>

                                                            <div class="content-wrap">
                                                                <a href="{{ route('property.show',$data->id) }}">
                                                                    <div class="title"
                                                                         title="Apartemen Tower D Waterplace">
                                                                        {{ $data->listTitle }}
                                                                    </div>
                                                                </a>

                                                                <div class="price">
                                                                    <?php
                                                                    $rp = $data->listListingPrice;
                                                                    $rp = (0 + str_replace(",", "", $rp));

                                                                    if ($rp > 1000000000) {
                                                                        $rp = round(($rp / 1000000000), 3);
                                                                        echo 'Rp.' . ' ' . $rp . ' M';
                                                                    } else {
                                                                        $rp = round(($rp / 1000000), 0);
                                                                        echo 'Rp.' . ' ' . $rp . ' Jt';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="desc">{{ $data->listDescription }}
                                                                </div>
                                                                <div class="amenities">
                                                                    <div class="row m0">
                                                                        <div class="w-70 pull-left">

                                                                            <div class="icon-text">
                                                                                <i class="fa fa-bed"></i>
                                                                                @if(is_null($data->listBedroom))
                                                                                    <span> - </span>
                                                                                @else
                                                                                    <span>{{ $data->listBedroom }}</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="icon-text">
                                                                                <i class="fa fa-shower"></i>
                                                                                @if(is_null($data->listBathroom))
                                                                                    <span> - </span>
                                                                                @else
                                                                                    <span>{{ $data->listBathroom }}</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="icon-text">
                                                                                <i class="fa fa-area-chart"></i>
                                                                                @if(is_null($data->listLandSize))
                                                                                    <span> - m<span
                                                                                                class="rank">2</span> </span>
                                                                                @else
                                                                                    <span>{{$data->listLandSize }}
                                                                                        m<span class="rank">2</span></span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="w-30 pull-right">
                                                                            <a href="{{ route('property.show',$data->id) }}"
                                                                               class="l-button">More Info</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="location row m0">
                                                                    <i class="fa fa-map-marker"></i>

                                                                    <div class="text">
                                                                        <span>
                                                                            @foreach($linked->listCityId as $city)
                                                                                @if($city->id == $data->links->listCityId)
                                                                                    {{ $city->mctyDescription }}
                                                                                @endif
                                                                            @endforeach
                                                                        </span>
                                                                        <span>{{ $data->listStreetName }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div><!-- end container -->
                                    <!-- content_2 -->
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <nav class="site-navigation paging-navigation navbar">
                                        <div class="nav-previous"><a href="#">PREV PAGE</a></div>
                                        <ul class="pagination pagination-lg">
                                            <li><a href="#">1</a></li>
                                            <li><span class="active">2</span></li>
                                            <li><a href="#">3</a></li>
                                            <li><span class="nav-dots">...</span></li>
                                            <li><a href="#">5</a></li>
                                        </ul>
                                        <div class="nav-next"><a href="#">NEXT PAGE</a></div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                    </div><!-- tab-content -->
                </div><!-- tabs -->
            </div>
        </div>
    </div><!-- end Page Content -->

    <!-- Start Footer -->

    <!-- End Footer -->
</div>

<!-- Modal login, register, custom gallery -->
<div id="login-modal-open"></div>
<div id="register-modal-open"></div>
<div class="custom-galery">
    <input class="no-icheck gal" type="checkbox" id="op">

    <div class="lower"></div>
    <div class="overlay overlay-hugeinc">
        <label for="op"></label>
        <nav>
            <!-- Owl carousel -->
            <div class="owl-carousel owl-theme carousel-full-width owl-demo-3">
                <div class="item" style="background-image: url(http://placehold.it/950X800);"></div>
                <div class="item" style="background-image: url(http://placehold.it/800X650);"></div>
            </div>
            <!-- End Owl carousel -->
        </nav>
    </div>
</div>

<!-- End Modal login, register, custom gallery -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6Pwo89NTFbXWEtrcEsL14M6af-gSjfQ&libraries=places"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/infobox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/selectize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/tmpl.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.dependClass-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/draggable-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/markerwithlabel_packed.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/location.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jshashtable-2.1_src.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.numberformatter-1.2.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom-map.js') }}"></script>


<script>
    // coordinates for current location
    var _latitude = -6.225673;
    var _longitude = 106.808481;
    createHomepageGoogleMap(_latitude, _longitude);
</script>

<script>
    $('.selection').selectize({sortField: 'text'});
</script>

<script>
    if ($(".price-input").length > 0) {
        $(".price-input").each(function () {
            var vSLider = $(this).slider({
                from: 0,
                to: 100000000000,
                smooth: true,
                round: 0,
                step: 10000000,
                dimension: '.00'
            });
        });
    }
</script>

<!--[if gt IE 8]> -->
<script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>
<![endif]-->
</body>
</html>

