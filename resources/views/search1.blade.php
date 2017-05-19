<!DOCTYPE html>

<style>
    input[type=checkbox] {
        -webkit-appearance: checkbox;
    }
</style>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.slider.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/selectize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/customsas.css') }}" type="text/css">


    <title>Search</title>
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

                        <div class="location-map pull-left">
                            <div class="input-group">
                                <input type="text" class="form-control" id="address-map"
                                       placeholder="Where do you want to live ?" v-model="query"
                                @keyup.enter="locateMap">
                            </div>
                        </div>


                        <div class="select-block select-block-sm pull-left">
                            <select class="selectize-input" v-model="bed" v-on:change="multipleCall">
                                <option value="" selected style="display:none"> Beds</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5 +</option>
                            </select>
                        </div>

                        <div class="select-block select-block-sm pull-left">
                            <select class="selectize-input" v-model="filterCategory" v-on:change="multipleCall">
                                <option value="" selected style="display: none;">Type</option>
                                <option :value="cat.id" v-for="cat in categoryType">@{{ cat.lsclName }}</option>
                            </select>
                        </div>

                        <div class="select-block select-block-md pull-left">
                            <select class="selectize-input" v-model="propstype" v-on:change="multipleCall">
                                <option value="" selected style="display: none;">Property Type</option>
                                <option :value="proptype.id" v-for="proptype in propertyType">@{{ proptype.prtlName }}</option>
                            </select>
                        </div>

                        <div class="select-block pull-left">
                            <a class="options-button" id="toggle-link">More Filters</a>
                        </div>

                        <div class="select-block select-block-reset pull-left">
                            <a id="toggle-link" @click="resetButton">Reset</a>
                        </div>

                        {{--<div class="select-block col-sm-2 col-xs-2 col-md-1 last" style="height: 51px;padding:15px 15px;text-align:center;">--}}
                            {{--<button class="selectize-control block" style="background-color: #1274bd;color:white;" @click="resetButton">Reset All</button>--}}
                        {{--</div>--}}

                        <div class="options-overlay col-md-offset-4 col-sm-offset-5 col-sm-7" id="hidden_content"
                             style="display: none;">

                            <div class="row">
                                <div class="col-xs-12 top-mrg">
                                    <div class="internal-container features">
                                        <div class="col-xs-6 top-mrg">
                                            <div class="form-group">
                                                <label>Area Size :</label>
                                                <input type="text" class="form-control" placeholder="Enter an Amount"
                                                       v-model="landSize" style="padding:5px 10px;margin-bottom: 5px;" @keyup="multipleCall">

                                                <label>Building Size :</label>
                                                <input type="text" class="form-control" placeholder="Enter an Amount"
                                                       v-model="buildingSize" style="padding:5px 10px;margin-bottom: 5px;" @keyup="multipleCall">

                                                <section class="block">
                                                    <section>
                                                        <label> Min Price </label>
                                                        <select class="form-control" v-model="minPrice"
                                                                style="padding: 5px 10px;margin-bottom: 5px;" v-on:change="
                                                        multipleCall">
                                                        <option value="0">Min</option>
                                                        <option v-for="price in priceRange"
                                                                :value="price">@{{ formatRp(price)}}</option>
                                                        </select>
                                                    </section>

                                                    <section>
                                                        <label> Max Price </label>
                                                        <select class="form-control" name="" id=""
                                                                style="padding: 5px 10px;margin-bottom: 5px;"
                                                                v-model="maxPrice" v-on:change="multipleCall">
                                                        <option value="100000000000">Max</option>
                                                        <option v-for="price in priceRange"
                                                                :value="price">@{{ formatRp(price)}}</option>
                                                        </select>
                                                    </section>

                                                </section>

                                            </div>
                                        </div>


                                        <div class="col-xs-6 top-mrg">
                                            <label>Property Features:</label>
                                            <section class="block">
                                                <section>
                                                    <ul class="submit-features">
                                                        <li v-for="fac in facility" @click="multipleCall">
                                                        <label><input type="checkbox" v-model="checkedFacility"
                                                                      :value="fac.id">@{{ fac.fctlName }}</label>
                                                        </li>
                                                    </ul>
                                                </section>
                                            </section>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div><!-- options-overlay -->
                    </header><!-- end header -->


                    <ul class="tab-links col-md-5 col-xs-12">

                        <li class="col-lg-6  col-md-6 col-xs-6 no-pad active" @click="resetButton"><a href="#tab1"
                                                                                 class="map2"><img
                                        src="{{ asset('assets/img/map.png') }}" alt=""/>Map</a></li>


                        <li class="col-lg-6 col-md-6 col-xs-6 no-pad" @click="propertyGrid"><a href="#tab2"><img
                                        src="{{ asset('assets/img/grid.png') }}"
                                        alt=""/>Grid</a></li>
                    </ul>

                    <!-- tab-links -->
                    <div class="tab-content">
                        <div id="tab1" class="tab" style="display: block;">
                            <div class="sidebar col-sm-5 col-xs-12">
                                <!-- Map -->
                                <div id="map"></div>
                                <!-- end Map -->
                            </div><!-- sidebar -->
                            <div class="content col-sm-7 col-xs-12 no-padding">
                                <div class="wide-2" id="listing-property">

                                    <div class="col-xs-12 mbl-list-properties" style="overflow-y: scroll;height: 87vh;">
                                        <div class="row m0">

                                                <div class="container-404" v-if="error">
                                                    <div class="container">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="text-404" style="text-align: center">
                                                                    <div class="col-md-12 col-sm-12 no-page" style="text-align:center;margin-top:150px;">
                                                                        <span class="sorry">Oops.. Your search result not found !</span>
                                                                        <p style="text-align: center"> please search again using diffrent keywords.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>


                                            <div class="container-404 container-status" v-if="status">
                                                <div class="container">
                                                    <div class="text-404" style="text-align: center">
                                                        <div class=" no-page" style="text-align:center;margin-top: 150px;">
                                                            <img src="{{ asset('images/reload.gif') }}">
                                                            <br>
                                                            <span class="sorry">Searching For Property ....</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--<span class="help-block-danger" v-if="error"> Property Not Foundd !</span>--}}

                                            {{--@for($i=0;$i<10;$i++)--}}
                                            <div ref="marker" :id="'marker'+ prop.id" data-target="'marker'+ prop.id" class="search-map-wrap"
                                                 v-for="prop in property">
                                                <a :href="'property/' + prop.listUrl" style="display:block;">

                                                    <div class="house-card buy">
                                                        <div class="image-wrap"
                                                             :style="{ backgroundImage: 'url(' + imageUri + fil.filePreview + ')'}"
                                                             v-for="fil in file"
                                                             v-if="fil.id == prop.links.listFile[0]"
                                                        >
                                                            <label :class="[prop.links.listListingCategoryId == 1 ? 'buy' : 'rent' ]">
                                                                For @{{ prop.links.listListingCategoryId == 1 ? 'Sale' : 'Rent'   }} </label>
                                                        </div>

                                                        <div class="content-wrap">
                                                            <div class="title">
                                                                @{{ prop.listTitle }}
                                                            </div>


                                                            <div class="price">
                                                                @{{ prop.listListingPrice ? formatRp(prop.listListingPrice) : '' }}
                                                            </div>
                                                            <div class="desc">
                                                                @{{ prop.listDescription }}

                                                            </div>
                                                            <div class="amenities">
                                                                <div class="row m0">
                                                                    <div class="w-70 pull-left">

                                                                        <div class="icon-text">
                                                                            <i class="fa fa-bed"
                                                                               v-if="prop.listBedroom">
                                                                                @{{ prop.listBedroom }}
                                                                            </i>
                                                                            <i class="fa fa-bed" v-else>
                                                                                -
                                                                            </i>
                                                                        </div>

                                                                        <div class="icon-text">
                                                                            <i class="fa fa-shower"
                                                                               v-if="prop.listBathroom">@{{ prop.listBathroom }}</i>
                                                                            <i class="fa fa-shower" v-else> - </i>
                                                                        </div>

                                                                        <div class="icon-text">
                                                                            <i class="fa fa-area-chart"
                                                                               v-if="prop.listLandSize">@{{ prop.listLandSize }} m2</i>
                                                                            <i class="fa fa-area-chart"
                                                                               v-else> - m2 </i>
                                                                        </div>


                                                                        <div class="icon-text">
                                                                            <i class="fa fa-building"
                                                                               v-if="prop.listLandSize">@{{ prop.listBuildingSize }} m2</i>
                                                                            <i class="fa fa-building"
                                                                               v-else> - m2 </i>
                                                                        </div>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="location row m0">
                                                                <i class="fa fa-map-marker">@{{ prop.mctyDescription }}</i>

                                                                <div class="text">
                                                                <span v-for="cty in city"
                                                                      v-if="cty.id == prop.links.listCityId">@{{ cty.mctyDescription}}</span>
                                                                    <span v-if="prop.listStreetName">@{{ prop.listStreetName }}</span>
                                                                    <span v-else> - </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            {{--@endfor--}}
                                        </div>
                                    </div><!-- end container -->
                                </div>    <!-- end wide-2 -->


                            </div>    <!-- content -->
                        </div>


                        <div id="tab2" ref="tab" class="tab">
                            <div class="col-xs-12 content_2">
                                <div class="col-md-12">
                                    <!-- Range slider -->
                                    <div class="explore_grid">
                                        <div class="row">

                                            <div class="select-block no-border pull-right col-sm-2 col-xs-12">

                                                <select class="selectize-input"
                                                        style="margin-top:10px;height: 60%;padding:5px;" v-on:change="
                                                sortByValue(sortKey)" v-model="
                                                sortKey">
                                                <option value="" selected style="display:none;">Sort By:</option>
                                                <option value="newest">Newesst</option>
                                                <option value="oldest">Oldest</option>
                                                <option value="expensive">Expensive</option>
                                                <option value="cheapest">Cheapest</option>
                                                </select>

                                            </div>    <!-- select-block -->
                                        </div><!-- row -->
                                    </div>

                                    <div class="wide-2" id="listing-property">

                                        <div class="col-lg-12 col-md-12 col-xs-12"
                                             style="overflow-y: scroll;height: 83vh;">

                                            <div class="row m0">
                                                <div class="container-404" v-if="error">
                                                    <div class="container">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="text-404" style="text-align: center">
                                                                <div class="col-md-12 col-sm-12 no-page" style="text-align:center;">
                                                                    <span class="sorry">Oops.. Your search result not found !</span>
                                                                    <p style="text-align: center"> please search again using diffrent keywords.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="search-map-wrap" v-for="prop in propGrid">
                                                    <div class="house-card buy">

                                                        <a :href="'property/' + prop.id">
                                                            <div class="image-wrap"
                                                                 :style="{ backgroundImage: 'url(' + imageUri + fil.filePreview + ')'}"
                                                                 v-for="fil in fileGrid"
                                                                 v-if="fil.id == prop.links.listFile[0]"
                                                            >
                                                                <label :class="[prop.links.listListingCategoryId == 1 ? 'buy' : 'rent' ]">
                                                                    For @{{ prop.links.listListingCategoryId == 1 ? 'Sale' : 'Rent'   }}
                                                            </div>
                                                        </a>

                                                        <div class="content-wrap">
                                                            <a :href="'property/' + prop.id">
                                                                <div class="title">
                                                                    @{{ prop.listTitle }}
                                                                </div>
                                                            </a>

                                                            <div class="price">
                                                                @{{ prop.listListingPrice ? formatRp(prop.listListingPrice) : '' }}
                                                            </div>
                                                            <div class="desc">
                                                                @{{ prop.listDescription }}
                                                            </div>
                                                            <div class="amenities">
                                                                <div class="row m0">
                                                                    <div class="w-70 pull-left">
                                                                        <div class="icon-text">
                                                                            <i class="fa fa-bed"
                                                                               v-if="prop.listBedroom">
                                                                                @{{ prop.listBedroom }}
                                                                            </i>
                                                                            <i class="fa fa-bed" v-else>
                                                                                -
                                                                            </i>
                                                                        </div>

                                                                        <div class="icon-text">
                                                                            <i class="fa fa-shower"
                                                                               v-if="prop.listBathroom">@{{ prop.listBathroom }}</i>
                                                                            <i class="fa fa-shower" v-else> - </i>
                                                                        </div>
                                                                        <div class="icon-text">
                                                                            <i class="fa fa-area-chart"
                                                                               v-if="prop.listLandSize">@{{ prop.listLandSize }}
                                                                                m2 </i>
                                                                            <i class="fa fa-area-chart"
                                                                               v-else> @{{ prop.listLandSize }} m2 </i>

                                                                        </div>
                                                                    </div>
                                                                    <div class="w-30 pull-right">
                                                                        <a :href="'property/' + prop.id"
                                                                           class="l-button">More Info</a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="location row m0">
                                                                <i class="fa fa-map-marker">@{{ prop.mctyDescription }}</i>

                                                                <div class="text">
                                                                <span v-for="cty in cityGrid"
                                                                      v-if="cty.id == prop.links.listCityId">@{{ cty.mctyDescription }}</span>
                                                                    <span v-if="prop.listStreetName">@{{ prop.listStreetName }}</span>
                                                                    <span v-else> - </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end container -->
                                    </div>    <!-- end wide-2 -->


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
</div>
<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>

<script src="{{ asset('js/vue.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/lodash.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.placeholder.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/js/infobox.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('assets/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/tmpl.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.dependClass-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/draggable-0.1.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/jquery.slider.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/js/custom-map.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/js/location.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('assets/js/jshashtable-2.1_src.js') }}"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6Pwo89NTFbXWEtrcEsL14M6af-gSjfQ"></script>
<script type="text/javascript" src="{{ asset('assets/js/markerwithlabel_packed.js') }}"></script>


{{--<script>--}}
{{--// coordinates for current location--}}
{{--var _latitude = -6.225673;--}}
{{--var _longitude = 106.808481;--}}
{{--createHomepageGoogleMap(_latitude, _longitude);--}}
{{--</script>--}}


<script>

    var markerHov = [];

    var app = new Vue({
        el: '#page-content-search',
        data: {
            error: false,
            cordinat: [],
            classCategory: true,
            status: true,
            sortKey: '',
            reverse: false,

            priceRange: [
                1000000, 10000000, 20000000, 30000000, 40000000, 50000000, 80000000, 100000000, 150000000, 200000000, 250000000, 300000000, 350000000, 400000000, 450000000, 500000000,
                600000000, 700000000, 800000000, 900000000, 1000000000, 2000000000, 3000000000, 5000000000, 8000000000, 10000000000, 100000000000
            ],

            listApi: {
                filterByCity: '&filter[mctyDescription]=',
                filterByBedroom: '&filter[listBedroom]=',
                filterByMinPrice: '&filter[listListingPrice][gte]=',
                filterByMaxPrice: '&filter[listListingPrice][lte]=',
                getListingCategory: 'ListingCategory',
                filterByCategoryId: '&filter[listListingCategoryId]=',
                getListingFacility: 'facility',
                filterByFacility: '&filter[listFacility][in]=',
                filterByBuildingSize: '&filter[listBuildingSize][>%3D]=',
                orderByNewestDate : 'listing?sort=-listPublishDate',
                filterByPropertyType : '&filter[listPropertyTypeId]=',
                fetchPropertyType : 'propertytype',
                filterByLandSize : '&filter[listLandSize][>%3D]=',
                filterByBath : '&filter[listBathroom]='
            },
            bath : '',
            fileGrid : [],
            cityGrid : [],
            propGrid : [],
            propstype :'',
            landSize : '',
            minPrice: '',
            maxPrice: '',
            loading: false,
            categoryType: [],
            categoryIs: '',
            property: [],
            checkedFacility: [],
            buildingSize: '',
            facility: [],
            city: [],
            file: [],
            test: [],
            query: '',
            bed: '',
            propertyType : [],
            filterCategory: '',
            baseUri: 'https://www.remax.co.id/prodigy/papi/',
            imageUri: 'https://www.remax.co.id/prodigy/papi/'


        },

        ready: function () {
            this.createMap();
        },

        created: function () {
            this.fetchPropertyType();
            this.fetchFacility();
            this.fetchListCategory();
            this.getValue();
            this.getCoordinat();
            this.createMap();
        },

        methods: {
            resetButton : function(){
                var vm = this;

                vm.query = '',
                vm.bed = '',
                vm.minPrice = '',
                vm.maxPrice = '',
                vm.filterCategory = '',
                vm.buildingSize = '',
                vm.checkedFacility = [],
                vm.propstype = ''

                this.createMap();
                this.propertyGrid();
            },
            fetchPropertyType : function(){
                var vm = this;

                axios.get(vm.baseUri+ vm.listApi.fetchPropertyType)
                        .then(function(response){
                            vm.propertyType = response.data.data;
                        })
                        .catch(function(error){
                            console.log(error);
                        })

            },

            showMe : function(index){
                if(this.markerHov[index].getAnimation() != google.maps.Animation.BOUNCE){
                    this.markerHov[index].setAnimation(google.maps.Animation.BOUNCE);
                }else{
                    this.markerHov[index].setAnimation(null);
                }
            },

            createMap: _.debounce(function () {
                var vm = this;
                vm.property = [];
                vm.city = [];
                vm.file = [];
                vm.status = true;
                var imgFile = [];

                this.map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: {lat: -6.21, lng: 106.85},
                    scrollwheel : false,
                    disableDefaultUI: true
                });

                google.maps.event.addListener(this.map, 'idle', function () {
                    vm.status = true;
                    var ne1 = this.getBounds().getNorthEast().lat();
                    var ne2 = this.getBounds().getNorthEast().lng();
                    var sw1 = this.getBounds().getSouthWest().lat();
                    var sw2 = this.getBounds().getSouthWest().lng();

                    setTimeout(function(){
                        listedHover();
                        markerHover();
                    }, 1000);


                    axios.get('https://www.remax.co.id/prodigy/papi/listing?filter[listPoint][thm]=' + ne1 + ',' + ne2 + '&filter[listPoint][mta]=' + sw1 + ',' + sw2 + '')
                            .then(function (response) {
                                if (response.data.data == null) {
                                    vm.property = [];
                                } else {
                                    vm.error = false;
                                    vm.property = [];
                                    vm.status = false;
                                    markerHov = [];
                                    vm.property = response.data.data;
                                    vm.city = response.data.linked.listCityId;
                                    vm.file = response.data.linked.listFile;




                                    var infoWindow = new google.maps.InfoWindow(), marker, i;
                                    for (i = 0; i < vm.property.length; i++) {

                                        (function (index) {
                                            var x = JSON.parse(vm.property[i].listCoordinat);

                                            marker = new MarkerWithLabel({
                                                position: {
                                                    lat: x.coordinate.latitude,
                                                    lng: x.coordinate.longitude
                                                },
                                                id: vm.property[index].id ,
                                                map: app.map,
                                                labelContent: '<div class="marker-loaded" data-target="marker'+vm.property[index].id+'"><div class="map-marker"><img src="../images/map_marker.png" alt="" /></div></div>',
                                                labelAnchor: new google.maps.Point(50, 0),
                                                labelClass: "marker-style"

                                            });

                                            var urlProp = 'property/' + vm.property[index].listUrl;

                                            var circle = new google.maps.Circle({
                                                map: app.map,
                                                radius: x.radius,
                                                strokeColor: '#3e3e3e',
                                                strokeWeight: 0.5,
                                                fillColor: '#3e3e3e',
                                                fillOpacity: 0.12

                                            });

                                            circle.bindTo('center',marker,'position');


                                            var content = '<h4 class="firstHeading" style="color:black;">' + vm.property[index].listTitle + '</h4>' +
                                                    '<h6 style="color:#0055a5;">' + vm.formatRp(vm.property[index].listListingPrice) + '</h6>' +
                                                    ('<a href="'  + urlProp + '">More <Detail></Detail></a>');

                                            marker.addListener('mouseover', function () {
                                                infoWindow.setContent(content);
                                                infoWindow.open(map, this);
                                            });

//                                            marker.addListener('mouseout', function () {
//                                                infoWindow.close();
//                                            });




                                        })(i);
                                    }

                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });

                });

            }, 500),
            locateMap: _.debounce(function () {
                var geocoder = new google.maps.Geocoder();
                var vm = this;
                vm.status = true;
                vm.property = [];
                vm.error = '';
                vm.city = [];
                vm.file = [];
                var markers = [];

                if(vm.query == ''){
                    vm.query = 'jakarta'
                }

                geocoder.geocode({address: vm.query}, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {

                        vm.map.setCenter(results[0].geometry.location);
                        axios.get(vm.baseUri+ vm.listApi.filterByCity + '%25%27' + vm.query + '%25%27')
                                .then(function (response) {
                                    if (response.data.data == null) {
                                        vm.status = false;
                                        vm.error = 'Property not found , try with different keyword !';
                                    } else {
                                        vm.status = false;
                                        vm.property = response.data.data;
                                        vm.city = response.data.linked.listCityId;
                                        vm.file = response.data.linked.listFile;
                                    }

                                    var bounds = new google.maps.LatLngBounds();

                                    var newMarkers = [];
                                    var infoWindow = new google.maps.InfoWindow(), marker, i;

                                    for (i = 0; i < vm.property.length; i++) {

                                        var x = JSON.parse(vm.property[i].listCoordinat);

                                        if (x) {
                                            marker = new google.maps.Marker({
                                                position: {
                                                    lat: x.coordinate.latitude,
                                                    lng: x.coordinate.longitude
                                                },
                                                map: app.map
                                            });

                                            markers.push(marker);
                                            markers[i].setMap(null);
                                            alert();

                                            bounds.extend({
                                                        lat: x.coordinate.latitude,
                                                        lng: x.coordinate.longitude
                                                    }
                                            );
                                            app.map.fitBounds(bounds);
                                        }

                                    }

                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                    }

                })
            }, 500),

            multipleCall : function(){
                var vm = this;
              vm.advanceSearch();
              vm.propertyGrid();
            },

                advanceSearch: _.debounce(function () {
                var vm = this;
                vm.property = [];
                vm.status = true;
                vm.error = '';
                vm.file = [];
                vm.city = [];


                if(vm.bath == ''){
                    vm.listApi.filterByBath = ''
                }else{
                    vm.listApi.filterByBath = '&filter[listBathroom]='
                }

                if(vm.landSize ==''){
                    vm.listApi.filterByLandSize = ''
                }else{
                    vm.listApi.filterByLandSize = '&filter[listLandSize][>%3D]='
                }

                if (vm.filterCategory == '') {
                    vm.listApi.filterByCategoryId = ''
                }else{
                    vm.listApi.filterByCategoryId = '&filter[listListingCategoryId]='
                }

                if(vm.query == ''){
                    vm.listApi.filterByCity = ''
                }else{
                    vm.listApi.filterByCity = '&filter[mctyDescription]=%27%25'+ vm.query +'%25%27'
                }

                if(vm.propstype == ''){
                  vm.listApi.filterByPropertyType = ''
                }else{
                  vm.listApi.filterByPropertyType = '&filter[listPropertyTypeId]='
                }

                if(vm.bed == ''){
                    vm.listApi.filterByBedroom = ''
                }else if(vm.bed == 5){
                    vm.listApi.filterByBedroom = '&filter[listBedroom][>%3D]='
                }else{
                    vm.listApi.filterByBedroom = '&filter[listBedroom]='
                    }

                if (vm.minPrice == '') {
                    vm.listApi.filterByMinPrice = ''
                }else{
                    vm.listApi.filterByMinPrice = '&filter[listListingPrice][gte]='
                }

                if (vm.maxPrice == '') {
                    vm.listApi.filterByMaxPrice = ''
                }else{
                    vm.listApi.filterByMaxPrice = '&filter[listListingPrice][lte]='
                }

                if (vm.buildingSize == '') {
                    vm.listApi.filterByBuildingSize = ''
                }else{
                    vm.listApi.filterByBuildingSize = '&filter[listBuildingSize][>%3D]='
                }

                if(vm.checkedFacility == ''){
                    vm.listApi.filterByFacility = ''
                }else{
                    vm.listApi.filterByFacility = '&filter[listFacility][in]='
                }


                axios.get(vm.baseUri+ vm.listApi.orderByNewestDate
                                    + vm.listApi.filterByCity
                                    + vm.listApi.filterByBedroom + vm.bed
                                    + vm.listApi.filterByMinPrice + vm.minPrice
                                    + vm.listApi.filterByMaxPrice + vm.maxPrice
                                    + vm.listApi.filterByCategoryId + vm.filterCategory
                                    + vm.listApi.filterByBuildingSize + vm.buildingSize
                                    + vm.listApi.filterByFacility + vm.checkedFacility
                                    + vm.listApi.filterByPropertyType + vm.propstype
                                    + vm.listApi.filterByLandSize + vm.landSize)

                        .then(function (response) {
                            if (response.data.data == null) {
                                vm.error = true;
                                vm.status = false;
                                vm.property = [];
                            } else {
                                vm.status = false;
                                vm.property = response.data.data;
                                vm.file = response.data.linked.listFile;
                                vm.city = response.data.linked.listCityId;
                            }
                        })

                        .catch(function (error) {
                            console.log(error)
                        });
            }, 500),

            propertyGrid : function(){
                var vm = this;
                vm.propGrid = [];
                vm.status = true;
                vm.error = '';
                vm.fileGrid = [];
                vm.cityGrid = [];

                if(vm.landSize ==''){
                    vm.listApi.filterByLandSize = ''
                }else{
                    vm.listApi.filterByLandSize = '&filter[listLandSize][>%3D]='
                }

                
                if(vm.bath == ''){
                    vm.listApi.filterByBath = ''
                }else{
                    vm.listApi.filterByBath = '&filter[listBathroom]='
                }

                if (vm.filterCategory == '') {
                    vm.listApi.filterByCategoryId = ''
                }else{
                    vm.listApi.filterByCategoryId = '&filter[listListingCategoryId]='
                }

                if(vm.query == ''){
                    vm.listApi.filterByCity = ''
                }else{
                    vm.listApi.filterByCity = '&filter[mctyDescription]=%27%25'+ vm.query +'%25%27'
                }

                if(vm.propstype == ''){
                    vm.listApi.filterByPropertyType = ''
                }else{
                    vm.listApi.filterByPropertyType = '&filter[listPropertyTypeId]='
                }

                if(vm.bed == ''){
                    vm.listApi.filterByBedroom = ''
                }else if(vm.bed == 5){
                    vm.listApi.filterByBedroom = '&filter[listBedroom][>%3D]='
                }else{
                    vm.listApi.filterByBedroom = '&filter[listBedroom]='
                }

                if (vm.minPrice == '') {
                    vm.listApi.filterByMinPrice = ''
                }else{
                    vm.listApi.filterByMinPrice = '&filter[listListingPrice][gte]='
                }

                if (vm.maxPrice == '') {
                    vm.listApi.filterByMaxPrice = ''
                }else{
                    vm.listApi.filterByMaxPrice = '&filter[listListingPrice][lte]='
                }

                if (vm.buildingSize == '') {
                    vm.listApi.filterByBuildingSize = ''
                }else{
                    vm.listApi.filterByBuildingSize = '&filter[listBuildingSize][>%3D]='
                }

                if(vm.checkedFacility == ''){
                    vm.listApi.filterByFacility = ''
                }else{
                    vm.listApi.filterByFacility = '&filter[listFacility][in]='
                }


                axios.get(vm.baseUri+ vm.listApi.orderByNewestDate
                                + vm.listApi.filterByCity
                                + vm.listApi.filterByBedroom + vm.bed
                                + vm.listApi.filterByMinPrice + vm.minPrice
                                + vm.listApi.filterByMaxPrice + vm.maxPrice
                                + vm.listApi.filterByCategoryId + vm.filterCategory
                                + vm.listApi.filterByBuildingSize + vm.buildingSize
                                + vm.listApi.filterByFacility + vm.checkedFacility
                                + vm.listApi.filterByPropertyType + vm.propstype
                                + vm.listApi.filterByLandSize + vm.landSize)

                        .then(function (response) {
                            if (response.data.data == null) {
                                vm.propGrid = [];
                                vm.error = true;
                                vm.status = false;

                            } else {
                                vm.status = false;
                                vm.propGrid = response.data.data;
                                vm.fileGrid = response.data.linked.listFile;
                                vm.cityGrid = response.data.linked.listCityId;
                            }
                        })

                        .catch(function (error) {
                            console.log(error)
                        });

            },
            sortByValue: _.debounce(function (sortKey) {
                var vm = this;
                vm.status = true;
                vm.propGrid = [];
                sortKey = vm.sortKey;
                vm.file = [];
                vm.city = [];

                switch (sortKey) {
                    case 'cheapest':
                        axios.get(vm.baseUri + 'listing?sort=%2BlistListingPrice')
                                .then(function (response) {
                                    vm.status = false;
                                    vm.propGrid = response.data.data;
                                    vm.fileGrid = response.data.linked.listFile;
                                    vm.cityGrid = response.data.linked.listCityId;

                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        break;
                    case 'expensive':
                        axios.get(vm.baseUri + 'listing?sort=-listListingPrice')
                                .then(function (response) {
                                    vm.status = false;
                                    vm.propGrid = response.data.data;
                                    vm.fileGrid = response.data.linked.listFile;
                                    vm.cityGrid = response.data.linked.listCityId;
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        break;
                    case 'newest':
                        axios.get(vm.baseUri + 'Listing?sort=-listPublishDate')
                                .then(function (response) {
                                    vm.status = false;
                                    vm.propGrid = response.data.data;
                                    vm.fileGrid = response.data.linked.listFile;
                                    vm.cityGrid = response.data.linked.listCityId;
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        break;
                    case 'oldest':
                        axios.get(vm.baseUri + 'Listing?sort=listPublishDate')
                                .then(function (response) {
                                    vm.status = false;
                                    vm.propGrid = response.data.data;
                                    vm.fileGrid = response.data.linked.listFile;
                                    vm.cityGrid = response.data.linked.listCityId;
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        break;
                    case '':
                        this.locateMap();
                        break;
                }

            }, 200),


            getCoordinat: function (key) {
                return JSON.parse((key || null ));
            },

            getValue: function () {
                var vm = this;
                var getQuery = {};


                if (location.search !== "") {

                    getQuery = location.search.substr(1).split("=");

                    vm.query = getQuery[1].replace('+', ' ');

                    if (getQuery[0] == 'buySearch') {
                        vm.filterCategory = 1;
                    } else if(getQuery[0] != 'buySearch' && getQuery[0] != 'rentSearch'){
                       vm.query = ''
                    }else{
                        vm.filterCategory = 2;
                    }

                    this.locateMap();


                } else {
                    vm.query = '';
                }

            }
            ,

            fetchListCategory: function () {
                var vm = this;


                axios.get(vm.baseUri + 'ListingCategory')
                        .then(function (response) {
                            vm.categoryType = response.data.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
            }
            ,

            fetchFacility: function () {
                var vm = this;

                axios.get(vm.baseUri + 'facility')
                        .then(function (response) {
                            vm.facility = response.data.data;

                        })
                        .catch(function (error) {
                            console.log(error);
                        });

            },

            formatRp: function (value) {
                var x = value;
                if (x >= 1000000000) {
                    x = Math.round((x / 1000000000)).toFixed(2);
                    return x = 'Rp.' + ' ' + x + ' M';
                } else {
                    x = Math.round((x / 1000000)).toFixed(2);
                    return x = 'Rp.' + ' ' + x + ' Jt';
                }
            }

        }
    });
</script>


<!--[if gt IE 8]>->
<script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>
<![endif]-->
<script>
    $(".image-wrap").each(function () {
        $(this).lazyload({
            effect: "fadeIn",
            thumbnail: true,
            animateThumb: true,
            showThumbByDefault: true
        });
    });

    setTimeout(function(){
        listedHover();

        markerHover();        

    }, 3000);

    function listedHover(){
        // House Box\
        $(".search-map-wrap").on("mouseenter", function(){
            var id = $(this).attr("id");

            $(".search-map-wrap").css("opacity", "0.5");
            $(this).css("opacity", "1");

            $(".marker-loaded").find(".map-marker").css("background-color", "#fff");
            $(".marker-loaded[data-target="+id+"]").addClass("marker-active");
        });
        $(".search-map-wrap").on("mouseleave", function(){
            var id = $(this).attr("id");

            $(".search-map-wrap").css("opacity", "1");
            $(".marker-loaded").removeClass("marker-active");
        });
    }

    function markerHover(){
        // Map Marker
        $(".marker-loaded").on("mouseenter", function(){
            var id = $(this).attr("data-target");

            $(".search-map-wrap").css("opacity", "0.5");
            $(".search-map-wrap[id='"+id+"']").css("opacity", "1");

            // $(".marker-loaded").find(".map-marker").css("background-color", "#fff");
            $(this).addClass("marker-active");
        });
        $(".marker-loaded").on("mouseleave", function(){
            var id = $(this).attr("data-target");

            $(".search-map-wrap").css("opacity", "1");
            $(this).removeClass("marker-active");
        });
    }


</script>
</body>
</html>

