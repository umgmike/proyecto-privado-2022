@extends("theme.$theme.layout")

@section('Title')
  Aviones
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/scripts/admin/indexVuelos.js")}}" type="text/javascript"></script>
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

    <section class="content" id="indexVuelosActivar">
        <div class="card card-danger card-outline">

            <div class="card-header">
                <a href=" {{ route('page.create.Aviones') }} " class="btn btn-info tooltipsC" title="Crear registro de @yield('Title')">
                <i class="fa fa-fw fa-plus-circle"></i> Crear registro de @yield('Title')
                </a>
            </div>

            <div class="card-body">
                <div class="row">

                    @foreach($aviones as $av)
                    <div class="col-md-3">
                        <div class="card card-info card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset("uza/img/core-img/logoInicial.ico") }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">Avión : <strong> {{ $av->nombre_avion }} </strong></h3>

                                <p class="text-muted text-center">Código Avión : <strong> {{ $av->codigo }} </strong></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Empresa : </b> <a class="float-right"><strong> {{ $av->empresa }} </strong></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Capacidad</b> <a class="float-right"><strong id="hola"> {{ $av->capacidad }} </strong></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Categoría transporte : </b> <a class="float-right"><strong> {{ $av->categoria }} </strong></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Estado</b> <a class="float-right"><strong> {{ $av->estado_vuelo }} </strong></a>
                                    </li>

                                </ul>

                                <div class="form-group">
                                    @if($av->estado_vuelo == "En Espera")
                                        <a href=" {{ route('page.edit.Aviones', ['id' => $av->id])}} " class="btn btn-sm btn-info tooltipsC" title="Reservar en :  {{ $av->nombre_avion }} "><b>Reservar vuelo</b></a>
                                        <a href=" {{ route('page.edit.Aviones.temp', ['id' => $av->id])}} " class="btn btn-sm btn-danger tooltipsC" title="Editar Registros de :  {{ $av->nombre_avion }}"><b>Editar</b></a>
                                        <form action="{{route('page.activar.Aviones', ['id' => $av->id])}}" class="d-inline form-eliminar" method="POST">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn btn-sm btn-primary btn-accion-tabla eliminar tooltipsC" title="Avión {{ $av->nombre_avion }} :  {{ $av->estado_vuelo }} ">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{route('page.activar.Aviones.espera', ['id' => $av->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn btn-sm btn-success btn-accion-tabla eliminar tooltipsC" title="Avión {{ $av->nombre_avion }} :  {{ $av->estado_vuelo }} ">
                                            <i class="fa fa-recycle"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptsAdicionales')
    <script type="text/javascript">
    </script>
@endsection

