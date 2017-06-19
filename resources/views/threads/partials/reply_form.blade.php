<br>
<div class="reply-form-{{$comment->id}} hidden">
   <form action="{{ route('replycomment.store', $comment->id) }}" method="POST" role="form">
    {{ csrf_field() }}
    <div class="form-group">
      <textarea name="body" class="form-control" rows="3" required="required"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Reply</button>
  </form>
</div>