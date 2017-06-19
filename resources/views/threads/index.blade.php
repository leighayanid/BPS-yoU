@extends('layouts.app')

@section('content')

	@include('threads.partials.thread_list')

@endsection()

@section('sidebar')

    @include('layouts.partials.categories')
    
@endsection
