@extends('template')
@section('title')
Properties
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/customsas.css') }}" type="text/css">
@endsection
@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6Pwo89NTFbXWEtrcEsL14M6af-gSjfQ"></script>
@endsection
@section('content')
<!-- Page Content -->
<div id="page-content-search">
    <div class="container">
        <div class="wide_container_2" style="margin-left:0;margin-right:0;">
            <div class="tabs">
                <header class="col-md-7 col-xs-12 no-pad">
                    <div class="location-map pull-left">
                        <div class="input-group">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="select-block select-block-sm pull-left">
                        <select class="selectize-input" name="bed" id="bed" onchange="test();">
                            <option value="" selected style="display:none"> Beds</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5 +</option>
                        </select>
                    </div>
                    <div class="select-block select-block-sm pull-left">
                        <select class="selectize-input" name="filter[type]" id="filter[type]" onchange="test();">
                            <option value="" selected style="display: none;">Type</option>
                            <option value="1">Sell</option>
                            <option value="2">Rent</option>
                        </select>
                    </div>
                    <div class="select-block select-block-md pull-left">
                        <select class="selectize-input" name="filter[property]" id="filter[property]" onchange="test();">
                            <option value="" selected="selected" style="display: none;">Property Type</option> 
                            <option value="1">Home</option>
                            <option value="2">Soho</option>
                            <option value="3">Apartement</option>
                            <option value="4">Land</option>
                            <option value="5">Office</option>
                            <option value="6">Villa</option>
                            <option value="7">Shop House</option>
                        </select>
                    </div>
                    <div class="select-block pull-left">
                        <a class="options-button" id="toggle-link">More Filters</a>
                    </div>
                    <div class="select-block select-block-reset pull-left">
                        <a id="toggle-link">Reset</a>
                    </div>
                    <div class="options-overlay col-md-offset-4 col-sm-offset-5 col-sm-7" id="hidden_content" style="display: none;">
                        <div class="row">
                            <div class="col-xs-12 top-mrg">
                                <div class="internal-container features">
                                    <div class="col-xs-6 top-mrg">
                                        <div class="form-group">
                                            <label>Area Size :</label>
                                            <input type="text" class="form-control" placeholder="Enter an Amount" v-model="landSize" style="padding:5px 10px;margin-bottom: 5px;" @keyup="multipleCall">
                                            <label>Building Size :</label>
                                            <input type="text" class="form-control" placeholder="Enter an Amount" v-model="buildingSize" style="padding:5px 10px;margin-bottom: 5px;" @keyup="multipleCall">
                                            <section class="block">
                                                <section>
                                                    <label> Min Price </label>
                                                    <select class="form-control" v-model="minPrice" style="padding: 5px 10px;margin-bottom: 5px;" v-on:change="multipleCall">
                                                        <option value="0">Min</option>
                                                        <option v-for="price in priceRange" :value="price">@{{ formatRp(price)}}</option>
                                                    </select>
                                                </section>
                                                <section>
                                                    <label> Max Price </label>
                                                    <select class="form-control" name="" id="" style="padding: 5px 10px;margin-bottom: 5px;" v-model="maxPrice" v-on:change="multipleCall">
                                                        <option value="100000000000">Max</option>
                                                        <option v-for="price in priceRange" :value="price">@{{ formatRp(price)}}</option>
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
                                                        <label>
                                                            <input type="checkbox" v-model="checkedFacility" :value="fac.id">@{{ fac.fctlName }}
                                                        </label>
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
                    <li class="col-lg-12  col-md-6 col-xs-6 no-pad active" @click="resetButton">
                        <a href="#tab1" class="map2">
                            <img src="{{ asset('assets/img/map.png') }}" alt=""/>Mapx
                        </a>
                    </li>
                </ul>
                <!-- tab-links -->
                <div class="tab-content">
                    <div id="tab1" class="tab" style="display: block;">
                    <div class="sidebar col-sm-4 col-xs-12">
                            <!-- Map -->
                            <div id="map"></div>
                            <!-- end Map -->
                        </div><!-- sidebar -->
                        <div class="content col-sm-8 col-xs-12">
                            <div id="listing-property" class="wide-2">
                                <div class="col-xs-12 mbl-list-properties" style="overflow-y: scroll; height: 87vh;">
                                    <div class="row m0">
                                        @for ($i = 0; $i < 12; $i++)
                                        <div id="marker9" data-target="'marker'+ prop.id" class="search-map-wrap" style="opacity: 1;">
                                            <a href="property/Ruko_Strategis" style="display: block;">
                                                <div class="house-card buy">
                                                    <div class="image-wrap" style="background-image: url(&quot;https://www.remax.co.id/prodigy/papi/Listing/crud/9/links/ListingFile/83&quot;);"><label class="buy">
                                                        For Sale </label>
                                                    </div>
                                                    <!----><!----><!----><!----><!----><!----><!----> 
                                                    <div class="content-wrap">
                                                        <div class="title">
                                                            Ruko Strategis
                                                        </div>
                                                        <div class="price">
                                                            Rp. 2.00 M
                                                        </div>
                                                        <div class="desc">
                                                            Ruko strategis cocok untuk tempat usaha
                                                        </div>
                                                        <div class="amenities">
                                                            <div class="row m0">
                                                                <div class="w-70 pull-left">
                                                                    <div class="icon-text"><i class="fa fa-bed">
                                                                        -
                                                                    </i>
                                                                </div>
                                                                <div class="icon-text"><i class="fa fa-shower"> - </i></div>
                                                                <div class="icon-text"><i class="fa fa-area-chart"> - m2 </i></div>
                                                                <div class="icon-text"><i class="fa fa-building"> - m2 </i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="location row m0">
                                                        <i class="fa fa-map-marker"></i> 
                                                        <div class="text">
                                                            <!----><!----><span>Jakarta Utara</span> <span>Jl. Danau Sunter Utara</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- tab-content -->
@endsection
