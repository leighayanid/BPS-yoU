@extends('layouts.app')

@section('welcome header')
	@include('layouts.partials.welcome_header')
@endsection

@section('content')
		@include('threads.partials.thread_list')

@endsection

@section('sidebar')
	@include('layouts.partials.categories')
@endsection