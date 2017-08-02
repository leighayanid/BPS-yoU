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
				<label for="">College</label>
				<select name="college" id="college" class="form-control" required="required">
					<option value="" selected> {{ $thread->college }}</option>
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
				<textarea  name="thread" id="" class="form-control" rows="5" required="required" value="">{{ $thread->thread }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Edit thread</button>
		</form>
	</div>
@endsection