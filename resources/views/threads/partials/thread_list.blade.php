<div class="list-group">
	@forelse($threads as $thread)
		<a href="{{ route('threads.show', $thread->id) }}" class="list-group-item active">
			<h4 class="list-group-item-heading">{{ $thread->subject}}</h4>
			<p class="list-group-item-text">{{ str_limit($thread->thread, 100) }}</p>
		</a>
	@empty
		<center>
			<h3>No threads.</h3>
		</center>
	@endforelse
</div>
