@extends('template')
@section('css')
@stop
@section('js')
@stop
@section('title')
RE/MAX FRANCHISE
@stop
@section('content')
<div class="wide-1">
    @php
    $uri='http://genius.intelligence.id/papi/'
    @endphp
    @include('layout.modal_franchise')
    @if($body['data'] != null)
    @foreach($body['data'] as $content)
    @foreach($body['linked']['wbfrFileId'] as $linked)
    @if($content['links']['wbfrFileId'] == $linked['id'])
    <div class="parallax" style="background-image: url({{ $uri.$linked['filePreview'] }})">
        <div class="caption">
            <span class="border">{{ $content['wbflTitle'] }}</span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="wrapper-main-agent">
        <div class="content-main-agent">
            <?php echo $content['wbflDescription'];?>
        </div>
    </div>
    @endforeach
    @endif
</div>
@stop