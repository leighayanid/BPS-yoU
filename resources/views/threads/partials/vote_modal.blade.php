<div class="modal fade" id="vote_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">People who upvoted this thread</h4>
			</div>
			<div class="modal-body">
				@forelse($thread->votes as $vote)
					<h4>{{ $vote->user->name }}</h4>
				@empty
					<h4>No people upvoted this yet.</h4>
				@endforelse
			</div>
		</div>
	</div>
</div>