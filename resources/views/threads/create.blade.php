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
					<option value="" selected>Select your college</option>
					<option value="CICT">CICT</option>
					<option value="CIT">CIT</option>
					<option value="CTVT">CTVT</option>
					<option value="CEA">CEA</option>
					<option value="CBA">CBA</option>
					<option value="COE">COE</option>
					<option value="COA">COA</option>
					<option value="CAS">CAS</option>
					<option value="CBBS">CBBS</option>
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
