@if(session('message'))
 <div class="alert alert-success">
 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 	{{ session('message') }}
 </div>
@endif 
