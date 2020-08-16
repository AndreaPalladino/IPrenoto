<nav id="nav" class="navbar navbar-expand-md navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            <h4 class="font-weight-light text10">I<span class="h4 text-white">Prenoto</span></h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button id="contact" class="btn btn-custom  mr-3">Contattaci</button>
                </li>
                <li class="nav-item">
                <a href="{{route('manager.create')}}"><i class="fas fa-plus text10 fa-2x mr-3"></i></a>
                </li>
                <li class="nav-item">
                <a href="{{route('prenota')}}"><i class="fab fa-product-hunt text10 fa-2x"></i><span class="h5 text-white mr-3">renota</span></a>
                </li>
                <!-- Authentication Links -->
                @guest
                    
                    <li class="nav-item">
                        <a class="nav-link text10" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text10" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="text10 nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{route('profile')}}" class="dropdown-item">Profilo</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
