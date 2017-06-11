@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-1">
		<form action="{{ route('threads.store') }}" method="POST" role="form">
			<legend>What do you want to talk about?</legend>
			<div class="form-group">
				<label for="">Subject</label>
				<input type="text" class="form-control" id="subject" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Type</label>
				<input type="text" class="form-control" id="type" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Thread</label>
				<textarea name="" id="thread" class="form-control" rows="5" required="required"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection