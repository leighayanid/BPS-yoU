@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		@include('layouts.partials.error')
		<form action="{{ route('threads.store') }}" method="POST" role="form">
			{{ csrf_field() }}
			<legend>What do you want to talk about?</legend>
			<div class="form-group">
				<label for="">Subject</label>
				<input type="text" class="form-control" name="subject" id="" placeholder="Input subject" value="{{ old('subject')}}">
			</div>
			<div class="form-group">
				<label for="">College</label>
				<select name="college" id="college" class="form-control" required="required">
					<option value="CICT">College of Information and Communication Technology</option>
					<option value="CIT">College of Industrial Technology</option>
					<option value="CICT">College of Technical and Vocational Technology</option>
					<option value="CEA">College of Engineering and Architecture</option>
					<option value="CBA">College of Business and Accountancy</option>
					<option value="COE">College of Education</option>
					<option value="COA">College of Agriculture</option>
					<option value="CAS">College of Arts and Sciences</option>
					<option value="CBBS">College of Behavioral and Behavioral Sciences</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Thread</label>
				<textarea  name="thread" id="" class="form-control" rows="10" required="required" value="{{ old('thread')}}"></textarea>
			</div>
			<div class="form-group">
					{!! app('captcha')->display(); !!}
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection

@section('sidebar')
    @include('layouts.partials.categories')
@endsection
