<div class="list-group threads">
	@forelse($threads as $thread)
		<a href="{{ route('threads.show', $thread->id) }}" class="list-group-item active">
			<span class="badge pull-right">{{ $thread->votes()->count() }} {{ str_plural('upvote', $thread->votes()->count() ) }}</span>
			<h4 class="list-group-item-heading">{{ $thread->subject}}</h4>
			<p class="list-group-item-text muted">{{ str_limit($thread->thread, 200) }}</p>
		</a>
	@empty
		<center>
			<h3>No threads.</h3>
		</center>
	@endforelse
</div>
	
{{ $threads->appends(['search' => $s])->render() }}
