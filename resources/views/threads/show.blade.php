@extends('layouts.app')

@section('content')
	<div class="row">	
		@include('layouts.partials.error')
			<div class="col-md-1">
				<div style="margin-top: 20%;">
					<center>
						<span class="toggleButton text-center fa fa-caret-up fa-3x {{ $thread->isVoted()?'liked':''}}" onclick="voteThread('{{ $thread->id }}', this)"></span>
					</center>	
					<h4 class="text-center" id="{{ $thread->id }}-count">{{ $thread->votes()->count() }}</h4>
					<center>
						<span class="toggleButton text-center fa fa-caret-down fa-3x {{ $thread->isVoted()?'':'liked'}}" onclick="voteThread('{{ $thread->id }}', this)"></span>
					</center>	
				</div>
			</div>

			<div class="col-md-10">
				<div class="pull-right">
					<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-caret-down fa-2x"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a onclick="">	Mark as inappropriate</a></li>
                <li><a href="">	Report this</a></li>
            </ul>
        	</li>
				</div>

					<h3>{{ ucfirst(trans($thread->subject)) }}</h3>
					<p class="text-muted">Sent to {{ ucfirst(trans($thread->college)) }} {{ $thread->created_at->diffForHumans() }}, {{ $thread->created_at->format('d-m-Y') }}</p>
					<p>{!! \Michelf\Markdown::defaultTransform($thread->thread) !!}</p>
					<br>
					@if(auth()->user()->id == $thread->user_id)
						<div class="pull-right action-buttons">
							<a href="{{ route('threads.edit',$thread->id) }}" class="btn btn-info delete-button">Edit thread</a>
							<form action="{{ route('threads.destroy', $thread->id) }}" method="POST" role="form">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger delete-button">Delete</button>
							</form>
						</div>
					@endif
					<br>
			</div>
		
		@include('threads.partials.create_comment')
		@include('threads.partials.comment_list')


</div>

@endsection

@section('sidebar')
	@include('layouts.partials.categories')
@endsection