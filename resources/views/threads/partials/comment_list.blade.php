<div class="comments">	

	@forelse($thread->comments as $comment)
		<div class="well">
			<div class="pull-right action-buttons">
				<form action="{{ route('comments.destroy', $comment->id) }}" method="POST" role="form">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger delete-button"><i><span class="fa fa-trash-o"></span></i></button>
				</form>
			</div> <!-- end of action buttons-->
			<div class="comment-list">
				<h5>{!! \Michelf\Markdown::defaultTransform(ucfirst(trans($comment->body))) !!}</h5>
				<h6>replied by {{ $comment->user->name }}</h6>
			</div>
		</div><!-- end of well -->


	@empty
		<div class="well">
			<h5 class="text-center">No comments here. Be the first to reply.. <i class="fa fa-comments"></i></h5>
		</div>
	@endforelse

</div>