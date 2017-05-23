@extends('template')
@section('title')
Properties
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/customsas.css') }}" type="text/css">
<style type="text/css">
    .selectize-input {
        width: 100%;
    }
    #page-content-search .container .wide_container_2 .location-map {
        width: auto;
    }
</style>
@endsection
@section('js')
<script type="text/javascript">
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("map"),mapProp);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6Pwo89NTFbXWEtrcEsL14M6af-gSjfQ&callback=myMap"></script> 
@endsection
@section('content')
<!-- Page Content -->
<div id="page-content-search">
    <div class="container">
        <div class="wide_container_2" style="margin-left:0;margin-right:0;">
            <div class="tabs">
                <header class="col-md-8 col-xs-12 no-pad">
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
                            @if ($listingcategory['data'] != null)
                            @foreach ($listingcategory['data'] as $value)
                            <option value="{{$value['id']}}">{{$value['lsclName']}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="select-block select-block-md pull-left">
                        <select class="selectize-input" name="filter[property]" id="filter[property]" onchange="test();">
                            <option value="" selected="selected" style="display: none;">Property Type</option> 
                            @if ($propertytype['data'] != null)
                            @foreach ($propertytype['data'] as $value)
                            <option value="{{$value['id']}}">{{$value['prtlName']}}</option>
                            @endforeach
                            @endif
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
                <ul class="tab-links col-md-4 col-xs-12">
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
                                        @if ($property['data']!=null)
                                        @foreach ($property['data'] as $element)
                                        <div id="marker9" data-target="'marker'+ prop.id" class="search-map-wrap" style="opacity: 1;">
                                            <a href="property/Ruko_Strategis" style="display: block;">
                                                <div class="house-card buy">
                                                 @foreach ($property['linked']['listFile'] as $element2)
                                                 @if($element2['fileId'] == $element['links']['listFile'][0])
                                                 <div class="image-wrap" style="background-image: url(&quot;https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}?size=600,300&quot;);">
                                                     @break
                                                     @endif
                                                     @endforeach
                                                     @foreach ($property['linked']['listListingCategoryId'] as $lsclName)
                                                     @if ($lsclName['mlscId'] == $element['links']['listListingCategoryId'])
                                                     @if ($lsclName['id'] == 1)
                                                     <label class="buy">For Sale </label>
                                                     @else
                                                     <label class="rent">For Rent </label>
                                                     @endif
                                                     @endif
                                                     @endforeach
                                                 </div>
                                                 <div class="content-wrap">
                                                    <div class="title">
                                                        {{$element['listTitle']}}
                                                    </div>
                                                    <div class="price">
                                                        @if ($element['listListingPrice'] >= 100000000000)
                                                        Rp. {{$element['listListingPrice']/1000000000000}} T
                                                        @elseif($element['listListingPrice'] >= 1000000000)
                                                        Rp. {{$element['listListingPrice']/1000000000}} M
                                                        @else
                                                        Rp. {{$element['listListingPrice']/1000000}} JT
                                                        @endif
                                                    </div>
                                                    <div class="desc">
                                                        {{$element['listDescription']}}
                                                    </div>
                                                    <div class="amenities">
                                                        <div class="row m0">
                                                            <div class="w-70 pull-left">
                                                                <div class="icon-text">
                                                                    <i class="fa fa-bed">
                                                                        @if ($element['listBedroom'] != null)
                                                                        {{ $element['listBedroom'] }}
                                                                        @else
                                                                        {{ "-" }}
                                                                        @endif
                                                                    </i>
                                                                </div>
                                                                <div class="icon-text">
                                                                    <i class="fa fa-shower">
                                                                     @if ($element['listBathroom'] != null)
                                                                     {{ $element['listBathroom'] }}
                                                                     @else
                                                                     {{ "-" }}
                                                                     @endif
                                                                 </i></div>
                                                                 <div class="icon-text">
                                                                     <i class="fa fa-area-chart">
                                                                      @if ($element['listLandSize'] != null)
                                                                      {{ $element['listLandSize'] }}m<sup>2</sup>
                                                                      @else
                                                                      {{ "-" }}m<sup>2</sup>
                                                                      @endif
                                                                  </i>
                                                              </div>
                                                              <div class="icon-text">
                                                                  <i class="fa fa-building">
                                                                      @if ($element['listBuildingSize'] != null)
                                                                      {{ $element['listBuildingSize'] }}m<sup>2</sup>
                                                                      @else
                                                                      {{ "-" }}m<sup>2</sup>
                                                                      @endif
                                                                  </i>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="location row m0">
                                                    <i class="fa fa-map-marker"></i> 
                                                    <div class="text">
                                                        <span>
                                                         @foreach ($property['linked']['listCityId'] as $kab)
                                                         @if ($kab['mctyId'] == $element['links']['listCityId'])
                                                         {{ $kab['mctyDescription'] }}
                                                         @endif
                                                         @endforeach
                                                     </span> 
                                                     <span>
                                                         @foreach ($property['linked']['listProvinceId'] as $prov)
                                                         @if ($prov['mprvId'] == $element['links']['listProvinceId'])
                                                         {{ $prov['mprvDescription'] }}
                                                         @endif
                                                         @endforeach
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </a>
                             </div>
                             @endforeach
                             @else
                             DATA TIDAK DI TEMUKAN
                             @endif
                         </div>
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
