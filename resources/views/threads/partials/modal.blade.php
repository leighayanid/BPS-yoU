<div class="modal fade" id="users">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">People who upvoted this thread</h4>
			</div>
			<div class="modal-body">
				@forelse($thread->votes as $user)
					<h4>{{ $user }}</h4>
				@empty
					<h4>No people upvoted this yet.</h4>
				@endforelse
			</div>
		</div>
	</div>
</div>