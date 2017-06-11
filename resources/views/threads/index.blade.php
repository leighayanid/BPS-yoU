@extends('layouts.app')

@section('content')

	<h3 class="text-center">Recent Threads</h3>
	@include('threads.partials.thread_list')

@endsection()