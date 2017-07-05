<div class="modal fade" id="comment_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">People who liked this comment</h4>
			</div>
			<div class="modal-body">
				@forelse($thread->comments as $comment)
					<h4>{{ $comment->user->name }}</h4>
				@empty
					<h4>No people liked this yet.</h4>
				@endforelse
			</div>
		</div>
	</div>
</div>