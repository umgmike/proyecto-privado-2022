  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('welcome') }}" class="brand-link">
      <img src=" {{ asset("assets/$theme/dist/img/AdminLTELogo.png") }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LA AURORA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->id_genero == 2)
            <img src=" {{ asset("assets/$theme/dist/img/avatar2.png") }} " class="img-circle elevation-2" alt="User Image">
          @else
            <img src=" {{ asset("assets/$theme/dist/img/avatar5.png") }} " class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block"><strong> {{ Auth::user()->nombre }}</strong></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MENU</li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Configuraciones <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('page.usuarios') }} " class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p> Usuarios </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('page.roles') }}  " class="nav-link">
                                <i class="nav-icon fa fa-solid fa-key"></i>
                                <p> Roles </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{ route('page.Pasajeros') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Pasajeros</p>
                    </a>
                </li>

                <li class="nav-header">CONTROL DE VUELOS</li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-solid fa-school"></i>
                        <p>Reservaciones <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href=" {{ route('page.boleto') }} " class="nav-link">
                                <i class="nav-icon fa fa-closed-captioning"></i>
                                <p> Boleto </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('page.Aviones') }}  " class="nav-link">
                                <i class="nav-icon fa fa-solid fa-closed-captioning"></i>
                                <p> Aviones </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">OTROS</li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-solid fa-school"></i>
                        <p>Mantenimientos <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href=" {{ route('page.clases') }} " class="nav-link">
                                <i class="nav-icon fa fa-closed-captioning"></i>
                                <p> Clases de vuelos </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('page.empresas') }} " class="nav-link">
                                <i class="nav-icon fa fa-solid fa-closed-captioning"></i>
                                <p> Empresas de aerolineas </p>
                            </a>
                        </li>
                    </ul>
                </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <!-- /.sidebar-custom -->
  </aside>
