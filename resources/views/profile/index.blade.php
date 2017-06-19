@extends('layouts.app')

@section('content')
	<h3>{{ $user-> name }}</h3>
	<h4>{{ $user->email }}</h4>

	<div class="user-threads">
		<h3>Threads.</h3>
		@foreach($threads as $thread)
			<div class="list-group">
				<a href="{{ route('threads.show', $thread->id) }}" class="list-group-item active">
					<h4 class="list-group-item-heading">{{ $thread->subject }}</h4>
					<p class="list-group-item-text">Added thread {{ $thread->created_at->diffForHumans()}}</p>
				</a>
			</div>
		@endforeach
	</div>

	<hr>

	<div class="user-comments">
		<h3>{{$user->name}} latest comments.</h3>
		@forelse($comments as $comment)
			<div class="list-group">
				<a href="#" class="list-group-item active">
					<h4 class="list-group-item-heading">{{ $user->name}} commented on {{ $comment->commentable->subject }} {{ $comment->created_at->diffForHumans() }}</h4>
				</a>
			</div>
		@empty
		@endforelse
	</div>

@endsection

@section('sidebar')

@endsection