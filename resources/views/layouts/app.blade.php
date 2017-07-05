<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'BPS-yoU') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
	  @include('layouts.partials.navbar')
		@if(Auth::guest())
			@yield('welcome header')
		@endif
		<div class="container">
			@include('layouts.partials.success')
			<br>
			<div class="row">
				<div class="col-md-9">
					@yield('content')
				</div>
				<div class="col-md-3">
					@yield('sidebar')
				</div>
			</div><!-- end of row -->
		</div> <!-- end of container -->
		@include('layouts.partials.footer')
		@yield('js')
	</div> <!-- end of app -->

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
</body>
</html>
