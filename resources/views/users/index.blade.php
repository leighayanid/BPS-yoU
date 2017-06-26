@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-sm-12 col-md-12">
      <form action=" {{ route('threads.index') }}" method="get" role="search">
	      <div class="input-group" style="height: 30px;">
	          <input id="navbar-search" type="text" class="form-control" placeholder="Find your co-peninsulares" name="search">
	          <div class="input-group-btn">
	              <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
	          </div>
	      </div>
      </form>
  	</div>
	</div>

	<hr>

	<div class="container">
		@forelse($users as $user)
			<h4>{{ $user->name }}</h4>
		@empty

		@endforelse
	</div>
	
	{{$users->links() }}
@endsection

@section('sidebar')
	@include('layouts.partials.categories')
@endsection