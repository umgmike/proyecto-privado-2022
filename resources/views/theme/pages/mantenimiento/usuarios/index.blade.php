@extends("theme.$theme.layout")

@section('Title')
  Usuarios
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/secciones/seccion.js")}}" type="text/javascript"></script>
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <a href="" class="btn btn-info btn-block "></a>
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-info">
                Usuarios
              </div>
            </div><br>
            <div class="card-header">
              <a href="{{ route('create.usuarios') }}" class="btn btn-info tooltipsC" title="Crear Nuevo Usuario">
                <i class="fa fa-fw fa-plus-circle"></i> Crear Nuevo Usuario
              </a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre y Apellidos</th>
                  <th>Teléfono</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Género</th>
                  <th>Estado</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($usuarios as $usu)
                    <tr>
                      <td>{{ $usu->nombre_completo }}</td>
                      <td>{{ $usu->telefono }}</td>
                      <td>{{ $usu->usuario }}</td>
                      <td>{{ $usu->rol }}</td>
                      <td>{{ $usu->genero }}</td>
                      <td>
                        @if($usu->estado == 1)
                          <button class="btn btn-info btn-xs tooltipsC" title="Registro Activo">
                            <i class="fa fa-check-circle-o"> Activo</i>
                          </button>
                        @elseif($usu->estado == 0)
                          <button class="btn btn-danger btn-xs  tooltipsC" title="Registro Inactivo">
                            <i class="fa fa-times-circle-o"> Inactivo</i>
                          </button>
                        @endif
                      </td>
                      <td>
                        @if($usu->estado == 1)
                          <a href="{{ route('edit.Usuarios', ['id' => $usu->id])}}"´class=" tooltipsC" title="Editar registro">
                            <i class="fa fa-edit btn btn-outline-info btn-xs"></i>
                          </a>
                        @endif

                        @if($usu->estado == 1)
                          <form action="{{route('desactivar.Usuarios', ['id' => $usu->id])}}" class="d-inline form-eliminar" method="POST">
                            @csrf @method("delete")
                            <button type="submit" class="btn btn-outline-danger btn-xs btn-accion-tabla eliminar tooltipsC" title="Desactivar registro">
                                <i class="fa fa-trash"></i>
                            </button>
                          </form>

                        @else
                          <form action="{{route('desactivar.Usuarios', ['id' => $usu->id])}}" class="d-inline form-eliminar" method="POST">
                            @csrf @method("delete")
                            <button type="submit" class="btn btn-outline-success btn-xs btn-accion-tabla eliminar tooltipsC" title="Activar registro">
                              <i class="fa fa-recycle"></i>
                             </button>
                           </form>
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
    </div>
  </section>
@endsection
