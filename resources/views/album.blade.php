@extends('template')
@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $(".js-lazyload").each(function () {
            $(this).lazyload({
                effect: "fadeIn"
            });
        });
    });
</script>
@stop
@section('css')
@stop
@section('title')
    RE/MAX ALBUMS
@stop
@section('content')
    <!-- Page Content -->
    <div class="text-center" style="background: url({{ asset('images/GALLERY_HEADER.jpg') }});background-size:cover;"></div>
    <div class="container-news" style="margin-bottom:20px;">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="">Album</li>
        </ol>
        <div id="page-content-search">
            <div class="container-g p40-tb">
                <div class="row m0">
                    @foreach($body->data as $data)
                        <div class="col-md-3">
                            <a href="{{ url('gallery',$data->id) }}">
                                <div class="gallery-list" data-date="10 September 2016"
                                     data-title="{{$data->wbgyTitle }}">
                                    <div class="s-image">
                                        <div class="inner-image">
                                            @foreach($body->linked->wbgyFileId as $linked)

                                                @if($data->links->wbgyFileId == $linked->id)
                                                <div class="image js-lazyload"
                                                     data-original="{{ $uri.$linked->filePreview.'?size=600,300' }}"
                                                     style="background-color: #ddd;"></div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- end Page Content -->
    </div>
    <!-- End Page Content -->
@stop