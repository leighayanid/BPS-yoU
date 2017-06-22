@extends('layouts.app')

@section('content')
	<h3>{{ $user-> name }}</h3>
	<h4>{{ $user->email }}</h4>

	<hr>

	<div class="user-threads">
		<h3>Threads.</h3>
		@include('threads.partials.thread_list')
	</div>

	<hr>

	<div class="user-comments">
		<h3>{{$user->name}} latest comments.</h3>
		@forelse($comments as $comment)
			<div class="list-group">
				<a href="#" class="list-group-item active">
					<h5 class="list-group-item-heading">{{ $user->name}} commented on {{ $comment->commentable->subject }} {{ $comment->created_at->diffForHumans() }}</h5>
				</a>
			</div>
		@empty
		@endforelse
	</div>

@endsection

@section('sidebar')
	@include('layouts.partials.categories')
@endsection