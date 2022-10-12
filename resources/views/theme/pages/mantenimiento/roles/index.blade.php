@extends("theme.$theme.layout")

@section('Title')
  Roles
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
                Roles
              </div>
            </div><br>

            @if ((Auth::user()->id_rol === 1) && (Auth::user()->estado === 1))
                <div class="card-header">
                    <a href=" {{ route('page.create.roles') }} " class="btn btn-info tooltipsC" title="Crear registro del @yield('Title')">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear registro del @yield('Title')
                    </a>
                </div>
            @endif

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Rol Usuario</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificación</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $rs)
                    <tr>
                        <td>{{ $rs->rol}}</td>
                        <td>
                            @if($rs->estado == 1)
                              <button class="btn btn-info btn-sm tooltipsC" title="Registro Asignado">
                                <i class="fa fa-check-circle-o"> Activo </i>
                              </button>
                            @elseif($rs->estado == 0)
                              <button class="btn btn-danger btn-sm  tooltipsC" title="Registro No Asignado">
                                <i class="fa fa-times-circle-o"> Inactivo </i>
                              </button>
                            @endif
                        </td>
                        <td>{{ $rs->created_at }}</td>
                        <td>{{ $rs->updated_at }}</td>
                        <td>
                            @if ((Auth::user()->id_rol === 1) && (Auth::user()->estado === 1))
                                @if($rs->estado == 1)
                                    <a href="{{ route('page.edit.roles', ['id' => $rs->id])}}"´class=" tooltipsC" title="Editar registro">
                                    <i class="fa fa-edit btn btn-outline-info btn-xs"></i>
                                    </a>
                                @endif

                                @if($rs->estado == 1)
                                    <form action="{{route('page.desactivar.Rol', ['id' => $rs->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn btn-outline-danger btn-xs btn-accion-tabla eliminar tooltipsC" title="Desactivar registro">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>

                                @else
                                    <form action="{{route('page.desactivar.Rol', ['id' => $rs->id])}}" class="d-inline form-eliminar" method="POST">
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
