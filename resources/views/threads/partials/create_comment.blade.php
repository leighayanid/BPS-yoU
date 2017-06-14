<div class="reply-comment">
	<form action="{{ route('threadcomment.store', $thread->id) }}" method="POST" role="form">
		{{ csrf_field() }}
		<div class="form-group">
			<textarea name="body" id=" " class="form-control" rows="3" required="required"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>