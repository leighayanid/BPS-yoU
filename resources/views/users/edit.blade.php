@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('campus') ? ' has-error' : '' }}">
                            <label for="campus" class="col-md-4 control-label">Campus</label>
                            
                            <div class="col-md-6">
                               <select name="campus" id="campus" class="form-control">
                                    <option value="" selected>{{ $user->campus }}</option>
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
                            <label for="college" class="col-md-4 control-label">College</label> 
                            <div class="col-md-6">
                                <select name="college" id="college" class="form-control">
                                    <option value="" selected>{{ $user->college }}</option>
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
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected>{{ $user->status }}</option>
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
    @include('layouts.partials.categories')
@endsection

