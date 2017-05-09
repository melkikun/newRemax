@extends('template')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/slick-1.6.0/slick/slick.css') }}">
<style>
	.page-homepage body {
		height: 100%;
		overflow: hidden;
	}

	.bank-partner {
		font-size: 24px;
		padding-top: 20px;
		padding-bottom: 50px;
		text-align: center;
		top: 60%;
		left: 50%;
	}

	.advSearch-wrap img {
		margin: 0 auto;
		height: 50px;
	}

	.wrapper-icon {
		position: absolute;
		bottom: 0%;
		background: white;
		width: 100%;
		padding: 0 5px;

	}

	.slick-slide .slick-active {
		width: 150px !important;
		display: inline-block;
	}
</style>
@stop
@section('meta')
@section('og')
<meta name="keywords" content="{{ asset('/') }}">
<meta name="description" content="RE/MAX, perusahaan agen properti terkemuka di dunia kini hadir di Indonesia, dengan membawa serta budaya kerja profesional yang telah mengiringi kiprahnya selama 40 tahun dalam industri real estate dunia. RE/MAX Indonesia merupakan mitra kerja terpercaya dan menjadi solusi atas kebutuhan Anda dalam bidang properti">
<!-- Twitter Card data -->
<meta name="twitter:card" content="home">
<meta name="twitter:site" content="@remaxhome">
<meta name="twitter:title" content="RE/MAX HOME">
<meta name="twitter:description" content="RE/MAX, perusahaan agen properti terkemuka di dunia kini hadir di Indonesia, dengan membawa serta budaya kerja profesional yang telah mengiringi kiprahnya selama 40 tahun dalam industri real estate dunia. RE/MAX Indonesia merupakan mitra kerja terpercaya dan menjadi solusi atas kebutuhan Anda dalam bidang properti">
<meta name="twitter:creator" content="@remax">
<meta name="twitter:image" content="{{ asset('/') }}images/backgroundhome-v2.jpg)">

<!-- Facebook's Open Graph data -->
<meta property="og:title" content="RE/MAX HOME" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ asset('/') }}" />
<meta property="og:image" content="{{ asset('/') }}images/backgroundhome-v2.jpg)" />
<meta property="og:description" content="RE/MAX, perusahaan agen properti terkemuka di dunia kini hadir di Indonesia, dengan membawa serta budaya kerja profesional yang telah mengiringi kiprahnya selama 40 tahun dalam industri real estate dunia. RE/MAX Indonesia merupakan mitra kerja terpercaya dan menjadi solusi atas kebutuhan Anda dalam bidang properti" /> 
<meta property="og:site_name" content="{{ asset('/') }}" />
<meta property="fb:admins" content="816068768546426" />
<meta property="fb:app_id" content="816068768546426" /> 
@stop
@stop
@section('js')
<script type="text/javascript" src="{{ asset('assets/js/slick-1.6.0/slick/slick.min.js') }}"></script>
<script>
	$(".tabs-wrap ul li a").on("click", function () {
		var href = $(this).attr("href");
		$(".tabs-wrap ul li a").removeClass("active");
		$(this).addClass("active");

		$(".search-wrap form").addClass("hideit");
		$(href).removeClass("hideit");
	});

	$('.js-bankpartner-slide').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 8,
		slidesToScroll: 4,
		customPaging: function (slider, i) {
			return '<div class="bankpartner-paging"></div>';
		},
		autoplay: true,
		speed: 1000,
		focusOnSelect: false,
		prevArrow: '<div style="display:none;"></div>',
		nextArrow: '<div style="display:none;"></div>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 3,
				infinite: true,
				dots: false
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				infinite: true,
				dots: false
			}
		}]
	});
</script>
@stop
@section('title')
RE/MAX HOME
@stop
@section('content')
<div>
	<div class="home-section">
		<div class="home-center">
			<div class="tabs-wrap pos-relative">
				<ul class="row m0">
					<li><a href="#buyForm" class="buy active">{{$list['data']['0']['lsclName'] }}</a></li>
					<li><a href="#rentForm" class="rent">{{$list['data']['1']['lsclName'] }}</a></li>
				</ul>
				<a href="{{ url('properties') }}" class="adv-search">Advanced Search</a>
			</div>

			<div class="search-wrap">
				<form action="#" id="buyForm">
					<div class="row m0">
						<input type="text" placeholder="Find your dream home" class="form-control pull-left"
						name="buySearch">
						<button type="submit" class="btn btn-small btn-primary pull-left">Go</button>
					</div>
				</form>
				<form action="#" id="rentForm" class="hideit">
					<div class="row m0">
						<input type="text" placeholder="Find your dream home" class="form-control pull-left"
						name="rentSearch">
						<button type="submit" class="btn btn-small btn-primary pull-left">Go</button>
					</div>
				</form>
			</div>
		</div>

		<div class="wrapper-icon" style="background: white;">
			<div class="bankpartner-slide js-bankpartner-slide">
				@foreach($bank['data'] as $data)
				@foreach($bank['linked']['mbnkFileId'] as $linked)
				@if($data['links']['mbnkFileId'] == $linked['id'])
				<div style="display: inline-block;width: 100px;">
					<div style="width: 100%;text-align: center;">
						<a href="{{ $data['mbnkUrl']}}">
							<img style="background: white;" src="https://www.remax.co.id/prodigy/papi/{{ $linked['filePreview']}}?size=151,53" alt="#">
						</a>
					</div>
				</div>
				@endif
				@endforeach
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop