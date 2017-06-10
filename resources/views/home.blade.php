@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>Welcome, {{ Auth::user()->name }}!</h1>
            <p>Talk to your fellow students and alumni and make some friends.</p>
            <p>
                <a class="btn btn-primary btn-lg">Explore</a>
            </p>
        </div>
    </div>
</div>
@endsection
