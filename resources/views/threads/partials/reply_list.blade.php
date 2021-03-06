
<div class="reply-list" style="margin-left: 50px;">
	@foreach($comment->comments as $reply)
		<hr>
		<h5>{{ $reply->body }}</h5>
		<h6>replied by {{ $reply->user->name }}</h6>
	<span class="fa fa-reply toggleButton" onclick="toggleReply('{{ $comment->id }}')"></span>
	<span class="fa fa-heart {{ $reply->isLiked()?'liked':''}} toggleButton" onclick="likeComment('{{ $reply->id }}', this)"></span>
	<span class="toggleButton" id="{{ $reply->id }}-count">{{ $reply->likes()->count() }}</span>
	@endforeach
</div> <!-- end of reply list-->