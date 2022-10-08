@extends("theme.$theme.layout")

@section('Title')
  Edición de aviones
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/scripts/admin/aviones/create2.js")}}" type="text/javascript"></script>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <h4>
                    <i class="fa fa-user"><strong> @yield('Title') </strong> </i>
                </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="{{route('page.update.Aviones.temp', [$registro->id])}}" id="GuardarAviones2" method="POST" autocomplete="off">
                @csrf
                @method("put")
                <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">

                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-primary">
                            Editar Registro Aviones
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
                                <label for="codigo">Código : </label>
                                <input type="text" id="codigo" name="codigo" class="form-control" value="{{old('codigo', $registro->codigo ?? '')}}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="nombre_avion">Editar Nombre Avión : </label>
                                <input type="text" id="nombre_avion" name="nombre_avion" class="form-control" value="{{old('nombre_avion', $registro->nombre_avion ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="id_empresa">Editar Empresa : </label>
                                <select id="id_empresa" name="id_empresa" name="id_empresa" class="form-control">
                                    @if (count($listadoEmpresa))
                                            @foreach($listadoEmpresa as $item)
                                                <option
                                                    {{$registro->id_empresa == $item->id ? 'selected': ''}}
                                                    value="{{$item->id}}">{{$item->empresa}}
                                                </option>
                                            @endforeach
                                            @elseif ($listadoEmpresa != '')
                                                <option value="">No se encuentró ningún registro</option>
                                            @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="capacidad">Editar Capacidad : </label>
                                <input type="text" id="capacidad" name="capacidad" class="form-control" value="{{old('capacidad', $registro->capacidad ?? '')}}"/>
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Actualizar Registro">
                                <a href=" {{ route('page.Aviones') }} " class="btn btn-success">Cancelar</a>
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
