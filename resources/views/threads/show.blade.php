@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<div class="page-header">
				{{ $thread->subject }}
			</div>
			@if(auth()->user()->id == $thread->user_id)
			<div class="pull-right action-buttons">
				<a href="{{ route('threads.edit',$thread->id) }}" class="btn btn-info delete-button">Edit thread</a>
				<form action="{{ route('threads.destroy', $thread->id) }}" method="POST" role="form">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger delete-button">Delete</button>
				</form>
			</div>
			<div>
			@endif
				<p>{{ $thread->type }}</p>
				<p>{!! \Michelf\Markdown::defaultTransform($thread->thread) !!}</p>
			</div>
		</div>
	</div>
@endsection