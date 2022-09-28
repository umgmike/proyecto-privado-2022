@extends("theme.$theme.layout")

@section('Title')
  Pasajero
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

            <div class="card-header">
                <a href=" {{ route('page.create.Pasajeros') }} " class="btn btn-info tooltipsC" title="Crear registro del @yield('Title')">
                  <i class="fa fa-fw fa-plus-circle"></i> Crear registro del @yield('Title')
                </a>
              </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombres y Apellidos</th>
                    <th>Teléfono</th>
                    <th>DPI</th>
                    <th>Edad</th>
                    <th>Género</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pasajeros as $p)
                    <tr>
                        <td>{{ $p->nombre_completo}}</td>
                        <td>{{ $p->telefono }}</td>
                        <td>{{ $p->dpi }}</td>
                        <td>{{ $p->edad }}</td>
                        <td>{{ $p->genero }}</td>
                        <td>
                            @if($p->estado == 1)
                              <button class="btn btn-info btn-xs tooltipsC" title="Registro Asignado">
                                <i class="fa fa-check-circle-o"> Activo </i>
                              </button>
                            @elseif($p->estado == 0)
                              <button class="btn btn-danger btn-xs  tooltipsC" title="Registro No Asignado">
                                <i class="fa fa-times-circle-o"> Inactivo </i>
                              </button>
                            @endif
                        </td>
                        <td>
                            @if($p->estado == 1)
                                <a href="{{ route('page.edit.Pasajeros', ['id' => $p->id])}}"´class=" tooltipsC" title="Editar registro">
                                <i class="fa fa-edit btn btn-outline-info btn-xs"></i>
                                </a>
                            @endif

                            @if($p->estado == 1)
                                <form action="{{route('page.desactivar.Pasajeros', ['id' => $p->id])}}" class="d-inline form-eliminar" method="POST">
                                @csrf @method("delete")
                                <button type="submit" class="btn btn-outline-danger btn-xs btn-accion-tabla eliminar tooltipsC" title="Desactivar registro">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </form>

                            @else
                                <form action="{{route('page.desactivar.Pasajeros', ['id' => $p->id])}}" class="d-inline form-eliminar" method="POST">
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
  </section>
@endsection
