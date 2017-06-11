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
	<link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css">
</head>
<body>
	<div id="app">
	  @include('layouts.partials.navbar')
		@if(Auth::guest())
			@yield('welcome header')
		@endif
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					@include('layouts.partials.categories')
				</div>
				<div class="col-md-9">
					@yield('content')
				</div>
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
