@extends('layouts.app')

@section('content')
	<div class="row">
			
			@include('layouts.partials.error')

			@if(auth()->user()->id == $thread->user_id)
				<div class="pull-right action-buttons">
					<a href="{{ route('threads.edit',$thread->id) }}" class="btn btn-info delete-button">Edit thread</a>
					<form action="{{ route('threads.destroy', $thread->id) }}" method="POST" role="form">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger delete-button">Delete</button>
					</form>
				</div>
			@endif
			<br>
			<h3>{{ ucfirst(trans($thread->subject)) }}</h3>
				<p class="text-muted">Sent to {{ ucfirst(trans($thread->type)) }} {{ $thread->created_at->diffForHumans() }}, {{ $thread->created_at->format('d-m-Y') }}</p>
				<p>{!! \Michelf\Markdown::defaultTransform($thread->thread) !!}</p>
		<br>
		
		@include('threads.partials.comment_list')

		@include('threads.partials.create_comment')

</div>

@endsection