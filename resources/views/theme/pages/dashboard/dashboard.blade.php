@extends("theme.$theme.layout")

@section('Title')
  Dashboard
@endsection

@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <h4>
                    @if (Auth::user()->id_genero == 2)
                    <i class="fa fa-user-graduate"> Bienvenida : <strong> {{ Auth::User()->nombre }} {{ Auth::User()->apellido }}.</strong> </i>
                    @elseif (Auth::user()->id_genero == 1)
                    <i class="fa fa-user-graduate"> Bienvenido : <strong> {{ Auth::User()->nombre }} {{ Auth::User()->apellido }}.</strong> </i>
                    @endif
                </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url({{ asset("uza/img/core-img/uno.jpg") }}) center center;">
                            <h3 class="widget-user-username text-right"><strong>Usuarios</strong></h3>
                            <h5 class="widget-user-desc text-right"><strong>{{ count($datos['conteoUsuarios']) }}</strong></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset("uza/img/core-img/diseno1.jpg") }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                </div>
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <a href=" {{ route('page.usuarios') }} " class="small-box-footer">Usuarios <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block "></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url({{ asset("uza/img/core-img/dos.jpg") }}) center center;">
                            <h3 class="widget-user-username text-right"><strong>Roles usuarios</strong></h3>
                            <h5 class="widget-user-desc text-right"><strong>{{ count($datos['conteoRol']) }}</strong></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset("uza/img/core-img/diseno1.jpg") }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                </div>
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <a href="{{ route('page.roles') }} " class="small-box-footer">Roles <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block "></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url({{ asset("uza/img/core-img/tres.jpg") }}) center center;">
                            <h3 class="widget-user-username text-right"><strong>Boletos Vendidos</strong></h3>
                            <h5 class="widget-user-desc text-right"><strong>{{ count($datos['conteoBoleto']) }}</strong></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset("uza/img/core-img/diseno1.jpg") }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                </div>
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <a href="{{ route('page.boleto') }}" class="small-box-footer">Boletos <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block "></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url({{ asset("uza/img/core-img/cuatro.jpg") }}) center center;">
                            <h3 class="widget-user-username text-right"><strong>Aviones</strong></h3>
                            <h5 class="widget-user-desc text-right"><strong>{{ count($datos['conteoAvion']) }}</strong></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset("uza/img/core-img/diseno1.jpg") }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                </div>
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <a href="{{ route('page.Aviones') }}" class="small-box-footer">Aviones <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block "></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url({{ asset("uza/img/core-img/diez.png") }}) center center;">
                            <h3 class="widget-user-username text-right"><strong>Registro Pasajeros</strong></h3>
                            <h5 class="widget-user-desc text-right"><strong>{{ count($datos['conteoPasajero']) }}</strong></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset("uza/img/core-img/diseno1.jpg") }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                </div>
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <a href="{{ route('page.Pasajeros') }}" class="small-box-footer">Pasajeros <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block "></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url({{ asset("uza/img/core-img/nueve.jpg") }}) center center;">
                            <h3 class="widget-user-username text-right"><strong>Empresas de Aerolineas</strong></h3>
                            <h5 class="widget-user-desc text-right"><strong>{{ count($datos['conteoEmpresa']) }}</strong></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset("uza/img/core-img/diseno1.jpg") }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                </div>
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <a href="{{ route('page.empresas') }}" class="small-box-footer">Empresas <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block "></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url({{ asset("uza/img/core-img/siete.jpg") }}) center center;">
                            <h3 class="widget-user-username text-right"><strong>Clases de vuelos</strong></h3>
                            <h5 class="widget-user-desc text-right"><strong>{{ count($datos['conteoClase']) }}</strong></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset("uza/img/core-img/diseno1.jpg") }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                </div>
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <a href="{{ route('page.clases') }}" class="small-box-footer">Clases V. <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block "></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url({{ asset("uza/img/core-img/ocho.jpg") }}) center center;">
                            <h3 class="widget-user-username text-right"><strong>Generos</strong></h3>
                            <h5 class="widget-user-desc text-right"><strong>{{ count($datos['conteoGenero']) }}</strong></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset("uza/img/core-img/diseno1.jpg") }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                </div>
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <a  class="small-box-footer">Generos <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block "></a>
                    </div>
                </div>


            </div>

        </div>
    </section>


@endsection
