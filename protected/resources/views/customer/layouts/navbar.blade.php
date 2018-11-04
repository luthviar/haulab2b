<header>
    <nav class="navbar navbar-expand-md navbar-default fixed-top bg-light navbar-light navbar-laravel">
        <a class="navbar-brand text-center" href="#">
            <img src="{{ URL::asset('img/favicon.png') }}" alt="logo" width="70%" height="100%">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span style="" class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav mr-auto">
                @guest
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://haula-toys.com" target="_blank">Company Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>

                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://haula-toys.com" target="_blank">Company Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="alert('Feature is Coming Soon.')">My Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
{{--                            {{ __('Logout') }}--}}
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                            @csrf
                        </form>

                    </li>

                    @endguest



            </ul>
            <form class="form-inline mt-2 mt-md-0">
                {{--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesan Custom (RFQ)</button>
            </form>
        </div>
    </nav>
</header>