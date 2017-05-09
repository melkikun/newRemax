@extends('template')
@section('title')
Contact Us
@stop
@section('css')
<style>
    @media screen and (min-width: 240px) and (max-width: 768px) {
        .contact-form {
            margin-top: 10px;
            position: relative;
        }
    }
</style>
@stop

@section('content')
<!-- start Page Content -->
<div id="page-content">

    <div class="section-contact-us" style="background-image: url({{ asset('images/backgroundPage/contact-us-alt1.jpg') }});background-size:cover;">

        <div class="container">
            <div class="row">
                <div id="map2" class="map contact-map"></div>
                <div class="contact-form">
                    <h3 style="color: white;"><i class="fa fa-envelope"></i>&nbsp;&nbsp;SEND US A MESSAGE </h3>
                    <hr>
                    <form id="form-submit" class="form-submit" action="#">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <label>Name</label>
                                <input id="input-name" type="text" class="form-control"
                                placeholder="Name.."
                                required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label>Email Adress</label>
                                <input id="input-email" type="text" class="form-control"
                                placeholder="Email..."
                                required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label>Phone Number</label>
                                <input id="input-email" type="text" class="form-control"
                                placeholder="Phone ..."
                                required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <label>Subject:</label>
                                <select class="form-control" name="" id="">
                                    <option value="" disabled="" selected="">Please Select subject</option>
                                    <option value="1">Owning a RE/MAX Franchise</option>
                                    <option value="2">Becoming a RE/MAX agent</option>
                                    <option value="3">General Question</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <label>Your Message:</label>
                                <textarea id="text-area-contact" rows="4" cols="20" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="submit">
                            <span class="ffs-bs">
                                <button type="submit" class="btn btn-large btn-danger"
                                style="color:#fff;">Send Message
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Page Content -->
@stop

@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6Pwo89NTFbXWEtrcEsL14M6af-gSjfQ&libraries=places"></script>
<script type="text/javascript" src="{{ asset('assets/js/markerwithlabel_packed.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom-map.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<!--[if gt IE 8]-->
<script type="text/javascript" src="{{ asset('assets/js/ie.js')}}"></script>
<![endif]-->

<script>
        //Google map for contact us page
        $(document).ready(function () {
            function initialize() {
                var latlng = {lat: -6.225673, lng: 106.808481};
                var mapOptions = {
                    center: latlng,
                    zoom: 14
                };
                var map = new google.maps.Map(document.getElementById('map2'),
                    mapOptions);
                map.set('styles', [
                {
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                    {
                        "visibility": "off"
                    }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#616161"
                    }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#bdbdbd"
                    }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#757575"
                    }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#ffffff"
                    }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#757575"
                    }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#dadada"
                    }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#616161"
                    }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#c9c9c9"
                    }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                    ]
                }
                ]);
var marker = new MarkerWithLabel({
    position: latlng,
    map: map,
    labelContent: '<div class="marker-loaded"><div class="map-marker"><img src="{{ asset('images/map_marker.png') }}" alt=""></div></div>',
    labelClass: "marker-style"
});

var contentString = '<div id="mapinfo">' +

'<h4 class="firstHeading">{{$body->data->compName}}</h4>' +

'<h6></h6>' +
'<div><i class="fa fa-phone"></i><a href="tel:+48 192 28383746">Phone : {{$body->data->compPhone1}} </a></div>' +
'<div><i class="fa fa-mobile"></i><a href="tel:+48 192 28383746">Fax : {{ $body->data->compFax1 }}}</a></div>' +
'<p id="at">@</p>' +
'<div class="contactblock"><a href="#">{{ $body->data->compEmail }}</a></div>' +

'</div>';

var infowindow = new google.maps.InfoWindow({
    content: contentString
});
marker.addListener('click', function () {
    infowindow.open(map, marker);
});
}

google.maps.event.addDomListener(window, 'load', initialize);
});
</script>
@stop