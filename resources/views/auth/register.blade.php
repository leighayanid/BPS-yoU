@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Complete Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('campus') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                               <select name="campus" id="campus" class="form-control" required="required">
                                <option value="" selected>Select your campus</option>
                                    <option value="Main">Main</option>
                                    <option value="Balanga">Balanga</option>
                                    <option value="Abucay">Abucay</option>
                                    <option value="Orani">Orani</option>
                                    <option value="Dinalupihan">Dinalupihan</option>
                                    <option value="Bagac">Bagac</option>
                                </select>
                                @if ($errors->has('campus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('campus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group{{ $errors->has('college') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <select name="college" id="college" class="form-control" required="required">
                                    <option value="" selected>Select your designated college department</option>
                                    <option value="CICT">College of Information and Communication Technology</option>
                                    <option value="CIT">College of Industrial Technology</option>
                                    <option value="CICT">College of Technical and Vocational Technology</option>
                                    <option value="CEA">College of Engineering and Architecture</option>
                                    <option value="CBA">College of Business and Accountancy</option>
                                    <option value="COE">College of Education</option>
                                    <option value="COA">College of Agriculture</option>
                                    <option value="CAS">College of Arts and Sciences</option>
                                    <option value="CBBS">College of Behavioral and Behavioral Sciences</option>
                                </select>
                                @if ($errors->has('college'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('college') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <select name="status" id="status" class="form-control" required="required">
                                    <option value="" selected>School status</option>
                                    <option value="Student">Student</option>
                                    <option value="Alumnus">Alumnus</option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-block btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <hr>
                        <p class="text-center">or register with </p>
                         @include('layouts.partials.social_media_authentication')
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
    @include('layouts.partials.categories')
@endsection

