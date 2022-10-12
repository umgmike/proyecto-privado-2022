<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            @if (Auth::user()->id_genero == 2)
                Bienvenida :  <strong> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</strong>
            @else
                Bienvenido :  <strong> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</strong>
            @endif
            </a>
        </li>

        <li class="nav-item dropdown">
            @if (Auth::user()->id_rol === 1 )
                <a class="nav-link" data-toggle="dropdown">Rol : <strong> Administrador </strong></a>
            @else
                <a class="nav-link" data-toggle="dropdown">Rol : <strong> Empleado </strong></a>
            @endif
        </li>

      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
      @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->nombre }} <span class="caret"></span>
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
  </nav>
  <!-- /.navbar -->
