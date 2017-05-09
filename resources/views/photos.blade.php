@extends('template')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.8/css/lg-fb-comment-box.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.8/css/lg-transitions.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.8/css/lightgallery.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.6.3/css/justifiedGallery.min.css" type="text/css">
@stop
@section('title')
Gallery
@stop
@section('content')
<!-- Page Content -->
<div id="page-content-search">
    <div class="text-center"
    style="background: url({{ asset('images/GALLERY_HEADER.jpg') }});background-size:cover;">
</div>
<div class="searchDet-title">
    <h2>{{ $body->linked->wbgaWbgyId[0]->wbgyTitle }}</h2>
</div>
<div class="container-news" style="margin-bottom:20px;">
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('albums') }}">Album</a></li>
        <li>{{ $body->linked->wbgaWbgyId[0]->wbgyTitle }}</li>
    </ol>
</div>
<div class="row m0">
    <div id="js-lightgallery" class="row">

        @foreach($body->linked->wbgaFileId as $linked)
        <a href="{{$uri.$linked->filePreview}}">
            <div class="photos-item">
                <img class="lazy" data-original="{{$uri.$linked->filePreview }}" src="">
            </div>
        </a>
        @endforeach
    </div>
</div>
</div>
<!-- end Page Content -->
@stop

@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/g/lightgallery,lg-autoplay,lg-fullscreen,lg-hash,lg-pager,lg-share,lg-thumbnail,lg-video,lg-zoom"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.6.3/js/jquery.justifiedGallery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.lazyload.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        $("img.lazy").lazyload({
            effect: "fadeIn"
        });
        $('#js-lightgallery').lightGallery({
            mode: 'lg-fade',
            thumbnail: true
        });
        $(".js-justifiedGal").justifiedGallery({
            rowHeight: 240
        });
    });
</script>
@stop



