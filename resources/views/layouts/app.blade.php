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
			<div class="row">
				<div class="col-md-3">
					<center><h4>Categories</h4></center>
				</div>
				<div class="col-md-9">
					<a href="{{ route('threads.create') }}" class="btn btn-primary pull-right">Create thread</a>
				</div>
			</div><!-- end of row -->
			<br>
			<div class="row">
				<div class="col-md-3">
					@include('layouts.partials.categories')
				</div>
				<div class="col-md-9">
					@yield('content')
				</div>
			</div><!-- end of row -->

		</div> <!-- end of container -->
	</div> <!-- end of app -->

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
