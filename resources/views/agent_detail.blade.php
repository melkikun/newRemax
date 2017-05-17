@extends('template')
@section('css')
<style type="text/css">
    .wide-2 .white {
        background-color: #fff;
        display: inline-block;
        margin: 0 0 10px;
    }
    .wide-2 .sum .team-color{
        margin-top: 10px;
    }
    #page-content-agent .wide_container_2{
        width: 100%;
    }
</style>
@stop
@section('js')
@stop
@section('title')
RE/MAX AGENT {{$detail['data'][0]['mmbsFirstName']}}
@stop
@section('content')
<!-- Page Content -->
<div id="page-content-agent">
    <div class="wide_container_2">
        <div class="container">
            <div class="content">
                <div class="image-border col-md-3 col-sm-3">
                    <?php
                    $file = "http://placehold.it/265X290";
                    foreach ($detail['data'][0]['links']['mmbsFile'] as $element) {
                        foreach ($detail['linked']['mmbsFile'] as $element2) {
                            if($element2['fileId'] == $element && @is_array(getimagesize("https://www.remax.co.id/prodigy/papi/".$element2['filePreview']))){
                                $file = "https://www.remax.co.id/prodigy/papi/".$element2['filePreview'];                                           
                                break(2);
                            }
                        }
                    }
                    ?>
                    <div class="agent-image" style='background: rgba(0, 0, 0, 0) url("{{$file}}") repeat scroll center center / cover ;'></div>
                </div>
                <div class="agent-info col-md-9 col-sm-9">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <h3>{{$detail['data'][0]['mmbsFirstName']}}&nbsp;{{$detail['data'][0]['mmbsLastName']}}</h3>
                        </div>
                        <div class="agency">
                            <div class="agency-logo"></div>RE/MAX AGENT
                        </div>
                        <div class="text-block col-sm-12  col-xs-12">
                            <p class="team-color">Superhero&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;415 Deals Done</p>
                        </div>
                        <div class="col-xs-12">
                            <p>Aenean quis sem nisi. Aliquam vehicula gravida orci, nec pretium mi ultricies in. Donec fermentum pulvinar mauris sed gravida. Pellentesque neque justo, commodo sed varius at, sagittis ut neque. In luctus pellentesque hendrerit. Vivamus congue laoreet urna, sed cursus odio scelerisque id.</p>
                        </div>
                        <div class="text-block contact col-xs-12">
                            <div class="row">
                                <div class="text-block agency-contact">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <h3>Address:</h3>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <p class="strong">LightHouse Estate<img src="assets/img/map.png" alt=""></p>
                                                <p>4877 Spruce Drive</p>
                                                <p>West Newton, PA 15089</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <h3>Contact:</h3>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <a href="tel:+4819228383746"><p class="strong"><i class="fa fa-phone"></i>+48 192 28383746</p></a>
                                                <a href="tel:+4819228383746"><p class="strong"><i class="fa fa-mobile"></i>+48 192 28383746</p></a>
                                                <p class="skype-contact strong"><i class="fa fa-skype"></i><a href="skype:SkypeUser">lighthouseestate</a></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <h3 class="twitter">Social:</h3>
                                            <a href="http://facebook.com" target="blank"><i class="fa fa-facebook"></i></a><a href="http://twitter.com" target="blank"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- text-block contact -->
                        <div class="col-xs-12">
                            <span class="ffs-bs"><a class="btn btn-large btn-primary" href="#" data-toggle="modal" data-target="#modal-error">Send message to agent</a></span>
                        </div>
                    </div>
                </div><!-- agent-info -->
            </div><!-- content -->
        </div><!-- container -->
    </div>
    <div class="wide_container_2">
        <div class="tabs">
            <div class="input-group">
                @if (count($property['data'])!= null)
                My Properties ({{count($property['data'])}})
                @else
                My Properties(0)
                @endif
            </div>
            <ul class="tab-links">
                {{-- <li class="active"><a href="#tab3"><i class="fa fa-th-list"></i>List</a></li> --}}
            </ul>
            <!-- tab-links -->
            <div class="tab-content">
               <div id="tab3" class="tab" style="display: block;">
                <div class="wide-2">
                    <div class="container">
                        @if (count($property['data'])!= null)
                        @foreach ($property['data'] as $p)
                        <div class="row white">
                            <div class="col-md-3 col-sm-3 prp-img">
                                <div class="exp-img-2" style="background-image:url(http://themes.fruitfulcode.com/suburb/assets/img/shortcodes-header.jpg);background-size: cover;">
                                    <span class="filter"></span>
                                    <span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
                                    <div class="overlay">
                                        <div class="img-counter">23 Photo</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info col-lg-7 col-md-6 col-sm-6">
                                <h4><a href="property_page.html">{{$property['data']['0']['listTitle']}}</a></h4>
                                <p class="team-color">{{$property['data']['0']['listStreetName']}}</p>
                                <div class="block">
                                    <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                                        <img src="assets/img/bedroom.png" alt="">
                                        <p class="info-line">{{$property['data']['0']['listBedroom']}} Bedrooms</p>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                                        <img src="assets/img/bathroom.png" alt="">
                                        <p class="info-line">{{$property['data']['0']['listBathroom']}} Bathroom</p>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                                        <img src="assets/img/square.png" alt="">
                                        <p class="info-line">{{$property['data']['0']['listLandSize']}} m<sup>2</sup></p>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                                        <img src="assets/img/land.png" alt="">
                                        <p class="info-line">{{$property['data']['0']['listBuildingSize']}} m<sup>2</sup></p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
                                <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
                                <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
                                <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
                                <hr>
                                <p>
                                    {{$property['data']['0']['listDescription']}}
                                    @for ($i = 0; $i < 100; $i++)
                                    &nbsp;
                                    @endfor
                                </p>
                            </div>
                            <div class="item-price col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <div class="sum col-sm-12 col-xs-6">
                                    <p>
                                        @if ($property['data']['0']['listListingPrice'] >= 100000000000)
                                        Rp. {{$property['data']['0']['listListingPrice']/1000000000000}} T
                                        @elseif($property['data']['0']['listListingPrice'] >= 1000000000)
                                        Rp. {{$property['data']['0']['listListingPrice']/1000000000}} M
                                        @else
                                        Rp. {{$property['data']['0']['listListingPrice']/1000000}} JT
                                        @endif
                                    </p>
                                    <p class="team-color" style="color: red">FOR SELL</p>
                                </div>
                                <span class="ffs-bs col-xs-12 btn-half-wth"><a href="property_page.html" class="btn btn-default btn-small">learn more <i class="fa fa-caret-right"></i></a></span>
                                {{-- <div class="sum favorite col-sm-12 col-xs-6">
                                    <div class="bookmark col-xs-3" data-bookmark-state="empty">
                                        <span class="title-add">Add to bookmark</span>
                                    </div>
                                    <p class="col-xs-3">Fav</p>
                                    <div class="compare col-xs-3" data-compare-state="empty">
                                        <span class="plus-add">Add to compare</span>
                                    </div>
                                    <p class="col-xs-3">Comp</p>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>  
                <!-- end wide-2 -->
            </div>
        </div><!-- tab-content -->
    </div><!-- tabs -->
</div><!-- wide_container_2 -->
</div>
<!-- end Page Content -->   
<hr/>
@stop