@extends("theme.$theme.layout")

@section('Title')
  Usuarios
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fa fa-user-graduate"> Catálogo de <strong> @yield('Title') </strong> </i>
          </h4>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
          <div class="card">
            <a href="" class="btn btn-info btn-block "></a>
            <div class="ribbon-wrapper ribbon-sm">
              <div class="ribbon bg-info">
                Usuarios
              </div>
            </div><br>

            @if ((Auth::user()->id_rol == 1) && (Auth::user()->condicion == 1))
                <div class="card-header">
                    <a href=" {{ route('page.create.usuarios') }} " class="btn btn-info tooltipsC" title="Crear registro del usuario">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear registro del usuario
                    </a>
                </div>
            @endif

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombres y Apellidos</th>
                  <th>Teléfono</th>
                  <th>Usuario</th>
                  <th>Género</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($usuarios as $u)
                    <tr>
                        <td>{{ $u->nombre_completo }}</td>
                        <td>{{ $u->telefono }}</td>
                        <td>{{ $u->usuario }}</td>
                        <td>{{ $u->genero }}</td>
                        <td>{{ $u->rol }}</td>
                        <td>
                            @if($u->estado == 1)
                                <button type="submit" class="btn btn-info btn-sm tooltipsC" title="registrada">
                                    <i class="fa fa-check-circle-o"> Activo </i>
                                </button>
                                @elseif($u->estado == 0)
                                <button type="submit" class="btn btn-danger btn-sm  tooltipsC" title="anulada">
                                    <i class="fa fa-times-circle-o"> Inactivo</i>
                                </button>
                            @endif
                        </td>

                      <td>
                        @if ((Auth::user()->id_rol == 1) && (Auth::user()->condicion == 1))
                            @if($u->estado == 1)
                            <a href="{{ route('page.edit.Usuarios', ['id' => $u->id])}}"´class=" tooltipsC" title="Editar registro">
                                <i class="fa fa-edit btn btn-outline-info btn-xs"></i>
                            </a>
                            @endif

                            @if($u->estado == 1)
                            <form action="{{route('page.desactivar.Usuarios', ['id' => $u->id])}}" class="d-inline form-eliminar" method="POST">
                                @csrf @method("delete")
                                <button type="submit" class="btn btn-outline-danger btn-xs btn-accion-tabla eliminar tooltipsC" title="Desactivar registro">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                            @else
                            <form action="{{route('page.desactivar.Usuarios', ['id' => $u->id])}}" class="d-inline form-eliminar" method="POST">
                                @csrf @method("delete")
                                <button type="submit" class="btn btn-outline-success btn-xs btn-accion-tabla eliminar tooltipsC" title="Activar registro">
                                <i class="fa fa-recycle"></i>
                                </button>
                            </form>
                            @endif
                        @else
                            <button class="btn btn-outline-danger btn-sm  tooltipsC" title="Sin Acción">
                                <i class="fa fa-times-circle-o"> Sin privilegios </i>
                            </button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>

    </div>
  </section>
@endsection
