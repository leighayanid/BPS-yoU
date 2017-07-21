<div class="comments">	
	<h4>{{ $thread->comments->count() }} {{ str_plural('comment', $thread->comments->count()) }} found on this thread.</h4>
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
					<span class="fa fa-reply toggleButton" onclick="toggleReply('{{ $comment->id }}')"></span>
					<span class="fa fa-heart toggleButton {{$comment->isLiked()?'liked':''}}" onclick="likeComment('{{ $comment->id }}', this)"></span>
					<span class="toggleButton" id="{{ $comment->id }}-count" data-toggle="modal" href="#comment_modal">{{ $comment->likes()->count() }}</span>
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

@section('js')
<script>
        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }
        
        function likeComment(id,el){
          var csrfToken = '{{ csrf_token() }}';
          var likesCount = parseInt($('#'+id+"-count").text());
          $.post('{{route('like')}}',{ commentId: id, _token: csrfToken}, function(data){
            console.log(data);
            if(data.message==='liked'){
              $(el).addClass('liked');
              $('#'+id+"-count").text(likesCount+1);
            }else{
              $(el).removeClass('liked');
              $('#'+id+"-count").text(likesCount-1);
            }
          });
        }

     function voteThread(id, el){
          var csrfToken = '{{ csrf_token() }}';
          var votesCount = parseInt($('#'+id+"-count").text());
          $.post('{{route('vote')}}',{ threadId: id, _token: csrfToken}, function(data){
            console.log(data);
            if(data.message==='voted'){
              $(el).addClass('liked');
              $('#'+id+"-count").text(votesCount+1);
            }else{
              $(el).removeClass('liked');
              $('#'+id+"-count").text(votesCount-1);
            }
          });
        }

      function markAsInappropriateThread(id, el){
          var csrfToken = '{{ csrf_token() }}';
          // var marksCount = parseInt($('#'+id+"-count").text());
          $.post('{{route('mark')}}',{ threadId: id, _token: csrfToken}, function(data){
            console.log(data);
            if(data.message==='marked'){
              $(el).text('Unmark as inappropriate');
            }else{
              $(el).text('Mark as inappropriate');
            }
          });
        }
</script>
@endsection