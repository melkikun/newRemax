@extends('template')
@section('css')
<style>
    hr {
        border: 0;
        clear: both;
        display: block;
        width: 96%;
        background-color: grey;
        height: 1px;
        margin-bottom: 5px;
        margin-top: 5px;
    }
</style>
@stop
@section('js')
@stop
@section('title')
RE/MAX ABOUT US
@stop
@section('content')
<div class="wide-1">
    @php
    $uri = 'http://genius.intelligence.id/papi/'
    @endphp
    @foreach($body['data'] as $content)
    @foreach($body['linked']['wbabFileId'] as $linked)
    @if($content['links']['wbabFileId'] == $linked['id'])
    <div class="parallax" style="background-image: url({{ $uri.$linked['filePreview'] }})">
    <div class="caption">
        <span class="border">{{ $content['wbalTitle'] }}</span>
    </div>
</div>
@endif
@endforeach
<div class="wrapper-main-agent">
    <div class="content-main-agent">
        <div class="container">
            <?php echo $content['wbalContent']; ?>
        </div>
    </div>
</div>
@endforeach
</div>
@stop