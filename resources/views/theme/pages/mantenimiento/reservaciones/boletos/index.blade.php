@extends("theme.$theme.layout")

@section('Title')
  Boletos
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
                    <i class="nav-icon far fa-calendar-alt"> Catálogo de <strong> @yield('Title') </strong> </i>
                </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <a href="" class="btn btn-danger btn-block "></a>
                    <div class="ribbon-wrapper ribbon-sm">
                        <div class="ribbon bg-info">
                            Boletos
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Avion</th>
                                <th>Pasajero</th>
                                <th>Clase</th>
                                <th>Pais Origen</th>
                                <th>País Destino</th>
                                <th>Depto</th>
                                <th>Direccion</th>
                                <th>Fecha Salida</th>
                                <th>Fecha Entrada</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($boletos as $b)
                                <tr>
                                    <td>{{ $b->nombre_avion}}</td>
                                    <td>{{ $b->nombre_completo}}</td>
                                    <td>{{ $b->clase }}</td>
                                    <td>{{ $b->pais_origen }}</td>
                                    <td>{{ $b->pais_destino }}</td>
                                    <td>{{ $b->nombre }}</td>
                                    <td>{{ $b->direccion }}</td>
                                    <td>{{ $b->fecha_inicio }}</td>
                                    <td>{{ $b->fecha_fin }}</td>
                                    <td>
                                        @if($b->estado == 1)
                                        <button class="btn btn-info btn-sm tooltipsC" title="Registro Asignado">
                                            <i class="fa fa-check-circle-o"> Activo </i>
                                        </button>
                                        @elseif($b->estado == 0)
                                        <button class="btn btn-danger btn-sm  tooltipsC" title="Registro No Asignado">
                                            <i class="fa fa-times-circle-o"> Inactivo </i>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($b->estado == 1)
                                            <a href=" {{ route('page.edit.boleto', ['id' => $b->id])}} " class=" tooltipsC" title="Editar registro">
                                            <i class="fa fa-edit btn btn-outline-info btn-xs"></i>
                                            </a>
                                        @endif

                                        @if($b->estado == 1)
                                            <form action=" {{route('page.desactivar.boleto', ['id' => $b->id])}} " class="d-inline form-eliminar" method="POST">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn btn-outline-danger btn-xs btn-accion-tabla eliminar tooltipsC" title="Desactivar registro">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            </form>

                                        @else
                                            <form action=" {{route('page.desactivar.boleto', ['id' => $b->id])}} " class="d-inline form-eliminar" method="POST">
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
