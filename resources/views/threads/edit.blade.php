@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<form action="{{ route('threads.update', $thread->id) }}" method="POST" role="form">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<legend>Edit {{ $thread->subject }}</legend>
			<div class="form-group">
				<label for="">Subject</label>
				<input type="text" class="form-control" name="subject" id="" placeholder="Input subject" value="{{ $thread->subject }}">
			</div>
			<div class="form-group">
				<label for="">Type</label>
				<input type="text" class="form-control" name="type" id="" placeholder="Input type" value="{{ $thread->type }}">
			</div>
			<div class="form-group">
				<label for="">Thread</label>
				<textarea  name="thread" id="" class="form-control" rows="5" required="required" value="">{{ $thread->thread }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Edit thread</button>
		</form>
	</div>
@endsection