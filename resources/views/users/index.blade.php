@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-sm-12 col-md-12">
      <form action=" {{ route('peninsulares.index') }}" method="get" role="search">
	      <div class="input-group" style="height: 30px;">
	          <input id="search" type="text" class="form-control" placeholder="Find your co-peninsulares" name="search">
	          <div class="input-group-btn">
	              <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
	          </div>
	      </div>
      </form>
  	</div>
	</div>

	<hr>
		<!-- todo change this to cards -->
		<div class="row">
			@forelse($users as $user)
				<div class="col-md-1">
					<img src="{{ Gravatar::src($user->email, 50) }}" class="img-circle">
				</div>
				<div class="col-md-11">
					<a href="{{route('user_profile', $user )}}"><h4>{{ $user->name }}</h4></a>
					<h5>{{ $user->college }}</h5>
				</div>
		@empty
			<div>
				<h4 class="text-center">
					No user found. 
				</h4>
			</div>
		@endforelse
	</div>

	
	{{$users->links() }}
@endsection

@section('sidebar')
	@include('layouts.partials.categories')
@endsection