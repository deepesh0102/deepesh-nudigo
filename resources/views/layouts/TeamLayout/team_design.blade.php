<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<title>Nudigo Travel Happy</title>


	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta name="keywords" content="Template, html, premium, themeforest" />
	<meta name="description" content="Traveler - Premium template for travel companies">
	<meta name="author" content="Tsoy">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">



	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- GOOGLE FONTS -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
	<!-- /GOOGLE FONTS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/icomoon.css')}}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{ asset('css/styles.css')}}">
	<link rel="stylesheet" href="{{ asset('css/mystyles.css?v=1.3')}}">
	<link rel="stylesheet" href="{{ asset('css/dropzone.css')}}">
	<link rel="stylesheet" href="{{ asset('css/dropify.css ')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<script type="text/javascript">


			var host = "{{url('/')}}"
			var public_path = "{{ asset('/profileImage/small/')}}";


	</script>
	<script type="text/javascript" src="{{ asset('js/modernizr.js')}}"></script>

	<style type="text/css">
		.global-wrap{
			background-image: url("{{ asset('img/1024x487-2.png')}}") !important;
			background: url("{{ asset('img/1024x487-2.png')}}") !important;
		}

	</style>
	{{--Incude Style--}}
	@yield('style')
	{{--Incude Style--}}
</head>


<body>
<!-- pagewrap -->
<div class="global-wrap">


@include('layouts.TeamLayout.team_header')

@yield('content')

@include('layouts.TeamLayout.team_footer')


</div>
<div id="loader"><h5>Saving....Please Wait</h5></div>
<!--/ pagewrap -->
{{--Footer Script--}}
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/dropify.js')}}"></script>
{{--Custom form submission ajax function--}}
<script type="text/javascript" src="{{ asset('js/laravel-bootstrap-modal-form.js')}}"></script>
{{--Custom form submission ajax function--}}
<script type="text/javascript" src="{{ asset('js/slimmenu.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-timepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/nicescroll.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/dropit.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/ionrangeslider.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/icheck.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fotorama.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/typeahead.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/card-payment.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/magnific.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/owl-carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fitvids.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/tweet.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/countdown.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/gridrotator.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/dropzone.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/Sortable.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
{{--Footer Script--}}

{{--Include Script--}}

{{--Include Script--}}



@yield('script')
</body>
</html>
