<a data-toggle="modal" href="#modal-id"><span class="fa fa-reply"></span></a>
<a data-toggle="modal" href="#modal-id"><span class="fa fa-heart"></span></a>
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Replying to this comment of {{ $comment->user->name }}</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('replycomment.store', $comment->id) }}" method="POST" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="body" id="body" class="form-control" rows="3" required="required"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Reply</button>
        </form>
      </div> <!-- end of modal body -->
    </div><!-- end of modal content -->
  </div><!-- end of modal dialog -->
</div> <!-- end of modal -->