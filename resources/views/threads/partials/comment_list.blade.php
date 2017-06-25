<div class="comments">	
	<h4>There are {{ $thread->comments->count() }} comments found on this thread.</h4>
		<hr>
		@forelse($thread->comments as $comment)
			<div class="well">
				@if(auth()->user()->id == $thread->user_id)
				<div class="pull-right action-buttons">
					<form action="{{ route('comments.destroy', $comment->id) }}" method="POST" role="form">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger delete-button"><i><span class="fa fa-trash-o"></span></i></button>
					</form>
				</div> <!-- end of action buttons-->
				@endif
				<div class="comment-list">
					<h5>{!! \Michelf\Markdown::defaultTransform(ucfirst(trans($comment->body))) !!}</h5>
					<h6>replied by {{ $comment->user->name }}</h6>
					<span class="fa fa-reply" onclick="toggleReply('{{ $comment->id }}')"></span>
					<span class="fa fa-heart {{ $comment->isLiked()?'':'liked'}}" onclick="likeComment('{{ $comment->id }}', this)"></span>
					<span id="{{ $comment->id }}-count">{{ $comment->likes()->count() }}</span>
					<!-- reply to comment -->
				</div> <!-- end of comment list-->
			
					@include('threads.partials.reply_list')			
					@include('threads.partials.reply_form')
				
			</div><!-- end of well -->
		@empty
			<div class="well">
				<h5 class="text-center">No comments here. Be the first to reply.. <i class="fa fa-comments"></i></h5>
			</div>
		@endforelse
</div>