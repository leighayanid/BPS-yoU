<div class="reply-list" style="margin-left: 50px;">
	@foreach($comment->comments as $reply)
		<hr>
		<h5>{{ $reply->body }}</h5>
		<h6>replied by {{ $reply->user->name }}</h6>
	<span class="fa fa-reply" onclick="toggleReply('{{ $comment->id }}')"></span>
	@endforeach
</div> <!-- end of reply list-->