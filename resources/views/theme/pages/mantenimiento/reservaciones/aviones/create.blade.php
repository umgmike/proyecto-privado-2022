@extends("theme.$theme.layout")

@section('Title')
  Crear registro aviones
@endsection

@section("scripts")
    <script src="{{asset("assets/pages/scripts/admin/aviones/create.js")}}" type="text/javascript"></script>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <h4>
                    <i class="fa fa-users"><strong> @yield('Title') </strong> </i>
                </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action=" {{ route('page.save.Aviones') }}" id="GuardarAviones" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                <div class="ribbon-wrapper ribbon-xl">
                                    <div class="ribbon bg-danger">
                                    Crear registro aviones
                                    </div>
                                </div>
                                <a href="" class="btn btn-info btn-block "></a>
                                    <div class="card-body row">
                                        <div class="col-3 text-center d-flex align-items-center justify-content-center">
                                            <div class="image">
                                                <img src=" {{ asset("uza/img/core-img/logoInicial.ico") }} " alt="">
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">
                                                <label for="codigo">Código avión : </label>
                                                <input type="text" id="codigo" name="codigo" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre_avion">Nombre avión : </label>
                                                <input type="text" id="nombre_avion" name="nombre_avion" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="id_empresa">Empresa : </label>
                                                <select id="id_empresa" name="id_empresa" class="form-control">
                                                @if (count($empresa))
                                                    @foreach($empresa as $item)
                                                        <option value="{{$item->id}}">{{ $item->empresa }}</option>
                                                    @endforeach
                                                @elseif ($empresa != '')
                                                    <option value="">No se encuentró ningún registro</option>
                                                @endif
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="capacidad">Capacidad avión : </label>
                                                <input type="number" id="capacidad" name="capacidad" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Guardar Registro">
                                                <a href=" {{ route('page.Aviones') }} " class="btn btn-danger">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
