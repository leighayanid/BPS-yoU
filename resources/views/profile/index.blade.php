@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-2 col-md-offset-1">
			<img src="{{ Gravatar::src($user->email, 150) }}" alt="" class="img-circle pull-right">
		</div>
		<div class="col-md-8">	
			<h3>{{ $user-> name }}</h3>
			<h4>{{ $user->email }}</h4>
			@if($user == auth()->user())
			<a href="{{ route('peninsulares.edit', $user->id) }}"><p>Edit profile</p></a>
			@endif
		</div>
	</div>
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
			<h4 class="text-center">{{ $user->name }} doesn't commented on any posts yet.</h4>
		@endforelse
	</div>

@endsection

@section('sidebar')
	@include('layouts.partials.categories')
@endsection