<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                BPS-YOU
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <div class="col-sm-3 col-md-3">
                <form action=" {{ route('threads.index') }}" method="get" class="navbar-form navbar-left" role="search">
                <div class="input-group" style="height: 30px;">
                    <input id="navbar-search" style="width: 450px !important;"type="text" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Search threads here" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('threads.create') }}">New Thread  <i class="fa fa-plus"></i></a></li>
                <li><a href="">Peninsulares  <i class="fa fa-user"></i></a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login <i class="fa fa-sign-in"></i></a></li>
                    <li><a href="{{ route('register') }}">Register <i class="fa fa-lock"></i></a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{ Gravatar::src(Auth::user()->email, 22) }}" alt="" class="img-circle">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('user_profile', auth()->user() )}}">Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>