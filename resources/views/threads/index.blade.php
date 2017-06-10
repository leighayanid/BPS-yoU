@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="list-group">
		@forelse($threads as $thread)
			<a href="#" class="list-group-item active">
				<h4 class="list-group-item-heading">{{ $thread->subject}}</h4>
				<p class="list-group-item-text">{{ str_limit($thread->thread, 100) }}</p>
			</a>
		@empty
			<center>
				<h3>No threads.</h3>
			</center>
		@endforelse
		</div>
	</div>	
</div>

@endsection()