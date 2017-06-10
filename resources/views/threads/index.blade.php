@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="list-group">
		<h3>Recent Threads</h3>
			@include('threads.partials.thread_list')
		</div>
	</div>	
</div>

@endsection()