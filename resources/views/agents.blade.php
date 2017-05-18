@extends('template')
@section('css')
<style type="text/css">
    .ui-menu.ui-widget.ui-widget-content.ui-autocomplete.ui-front{
        border: none;
    }
    .img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img{
        display: inline !important;
    }
    .agent-img {
        margin: auto;
        position: relative;
        text-align: center;
    }
    .img-hover {
        background: rgba(9, 185, 229, 0.85) none repeat scroll 0 0;
        bottom: 0;
        left: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        text-align: center;
        top: 0;
        transform: scale(0, 0);
        transition: all 0.4s ease 0s;
    }
    .aTop.remaxBlueColor {
        text-align: center;
        font-size: 20px;
    }
    .centerAlign {
        text-align: center;
    }
    .row.agentHightlight.m-t.m-b {
        text-align: center;
    }
    .highlightIcon {
        background-image: url("{{ asset('/') }}assets/images/icon-1.png");
        background-position: center center;
        background-size: 180px auto;
        display: inline-block;
        height: 150px;
        width: 150px;
    }
    .highlightIcon.col2 {
        background-image: url("{{ asset('/') }}assets/images/icon-2.png");
    }
    .highlightIcon.col3 {
        background-image: url("{{ asset('/') }}assets/images/icon-3.png");
    }
    .highlightIcon.col4 {
        background-image: url("{{ asset('/') }}assets/images/icon-4.png");
    }
    .header-agent-title{
        font-weight: bolder;
        font-size: 20px;
        text-align: center;
    }
    .button-agents {
        background: white none repeat scroll 0 0;
        border: 2px solid grey;
        border-radius: 10px;
        color: black;
        font-size: 19px;
        font-weight: 500;
        opacity: 0.9;
        padding: 10px 20px;
    }
    .button-agents:hover {
        background: black none repeat scroll 0 0;
        border: 2px solid darkslategrey;
        border-radius: 10px;
        color: white;
        font-size: 19px;
        opacity: 0.9;
        padding: 10px 20px;
    }
    .agents-not-found {
        color: red;
        font-size: 20px;
        font-weight: bold;
        padding: 20px;
        text-align: center;
    }
    p{
        font-family: "Montserrat",sans-serif;
        font-size: 14px;
        line-height: 1.5;
    }

    .centerAlign.m-t {
        font-weight: bolder;
        padding: 20px;
    }
    .centerAlign.m-t > p {
        font-size: 20px;
    }

    .aTop.remaxBlueColor {
        border: 2px dotted;
        padding: 10px;
        margin-bottom: 20px;
    }
    .agent-img img{
        margin-bottom:15px;
    }
    .agent-profile ul{
        margin-top: 10px;
    }
    .full-profile-btn {
        margin-top: 10px;
    }
    img#agentTopBanner{
        display: none !important;
    }
    .btn{
        padding: 10px 10px;
    }
    .content-card {
        border: 2px dotted gray;
        padding: 10px;
    }
    .card {
        margin-bottom: 30px;
    }
    .card-title {
        text-align: center;
    }
    a{
        color: black !important;
    }
</style>
@stop
@section('js')
@stop
@section('title')
RE/MAX ABOUT US
@stop
@section('content')
<section>
    <div class="image">
        <img src="{{ asset('/') }}images/agent_top_bannerx.jpg" style="width: 100%;">
    </div>
</section>
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ url('agents') }}">Agents</a></li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid" id="agent-list-page">
        {!! Form::open(["url"=>"cariagen/search", "method"=>"get"]) !!}
        <div class="input-group">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." name="agents">
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit">SEARCH!</button>
                </span>
            </div><!-- /input-group -->
            {!! Form::close() !!}
        </div>
        @if (isset($first))
        @else
        <div class="agents-list">
            @if (($agent['data']) != null)
            @foreach ($agent['data'] as $key => $value)
            <div class="card col-sm-3">
                <a href="{{ url('/') }}{{$value['mmbsUrl']}}">
                    <div class="content-card">
                        <img class="card-img-top" src="{{ asset('/') }}images/default.jpg" alt="#" style="width: 80%; margin-left: 10%;">
                        <div class="card-block">
                            <h4 class="card-title">{{$value['mmbsFirstName']}}&nbsp;{{$value['mmbsLastName']}}</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;{{$value['mmbsCellPhone1']}}
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;{{$value['mmbsEmail']}}
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-id-card-o"></i>&nbsp;&nbsp;&nbsp;{{$value['id']}}
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="row">
                <div class="container-fluid">
                    <div class="agents-not-found">SORRY!!, DATA NOT FOUND</div>
                </div>
            </div>
        </div>
        @endif
        @endif
    </div>
</section>
<section>
    @foreach ($agentInfo['data'] as $element)
    {!! str_replace('<div class="container">', '<div class="container-fluid">', $element['wbilContent']) !!}
            @endforeach
            <div class="container-fluid">
                <div class="row" style="text-align: center;">
                    <button type="button" class="button-agents" id="button-agents" data-toggle="modal" data-target="#myModal">CLICK HERE TO JOIN US</button>
                </div>
            </div>
            <br/>
            <br/>
            </section>
            <section>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title "><b>Become a Proud RE/MAX AGENT</b></h4>
                            </div>
                            <div class="modal-body">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="email">Name:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Name" name="aname">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Email:</label>
                                        <input type="password" class="form-control" id="email" placeholder="Enter Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Phone:</label>
                                        <input type="password" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Message:</label>
                                        <textarea  class="form-control" id="message" name="message" placeholder="Enter Message"></textarea>
                                    </div>
                                    <button type="button" class="btn btn-danger col-sm-12">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @stop