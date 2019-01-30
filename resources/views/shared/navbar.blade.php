
<nav class="navbar fixed-top navbar-expand-md navbar-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('precamp.dashboard') }}">
        <img  src="{{ asset('images/logo_mdcrc.png') }}" Class="mx-auto d-block"
        alt="MDCRC" style="width:80px;z-index:999">
      </a>
      <div class="d-block d-md-none d-lg-none text-right">
        @guest
        @else
        {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
      @endguest
        <button class="navbar-toggler expanded-sidebar text-success" type="button"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <i class="material-icons" style="font-size: 41px;">
            view_headline
            </i>
        </button>
      </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mx-auto">
              <h3 class="text-white">
                {{-- <strong>
                Camp : {{ session()->get('district')->district }}
                </strong> --}}
              </h3>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons text-dark">
                          account_circle
                          </i>
                            {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('precamp.changepassword') }}">
                             <i class="material-icons m-2">
                              account_box
                             </i> {{ __('Change Password') }}
                           </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="material-icons m-2">
                                input
                                </i> {{ __('Logout') }}
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
