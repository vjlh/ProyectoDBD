
<nav class="navbar navbar-expand-lg navbar-dark bg-primary"
    style="padding: 1rem 1rem !important; background-color: #2C3E50 !important;"
>




<!-- Left Side Of Navbar -->
<i class="fas fa-3x fa-cat" style="color: white;"></i>
<a class="navbar-brand" style="margin-left: 2%;" href="{{ url('/') }}">
    AEROLÍNEAG8
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/vuelos">Vuelos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/paquetes">Paquetes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/hospedajes">Hospedajes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>                     

    <!-- Right Side Of Navbar -->
                    
        <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
<form class="form-inline my-2 my-lg-0">
    @guest
    @else
        <a title="icono_carrito" href="/carrito">
            <i class="fas fa-shopping-cart fa-3x" style="color: white;"> </i>
        </a>
    @endguest
</form>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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