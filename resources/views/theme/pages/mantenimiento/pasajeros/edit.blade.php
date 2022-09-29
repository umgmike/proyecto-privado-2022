@extends("theme.$theme.layout")

@section('Title')
  Edición de pasajeros
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/scripts/admin/pasajero/create.js")}}" type="text/javascript"></script>
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

    @include('includes.form-error')
    @include('includes.mensaje')

    <section class="content">
        <div class="container-fluid">
            <form action="{{route('page.update.Pasajeros', [$registro->id])}}" id="GuardarPasajeros" method="POST" autocomplete="off">
                @csrf
                @method("put")
                <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">

                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-primary">
                            Editar Registro Pasajero
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
                                <label for="nombre">Editar Nombres : </label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre', $registro->nombre ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="apellidos">Editar Apellidos : </label>
                                <input type="text" id="apellidos" name="apellido" class="form-control" value="{{old('apellido', $registro->apellido ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="telefono">Editar Teléfono : </label>
                                <input type="text" id="telefono" name="telefono" class="form-control" value="{{old('telefono', $registro->telefono ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="dpi">Editar DPI : </label>
                                <input type="text" id="dpi" name="dpi" class="form-control" value="{{old('dpi', $registro->dpi ?? '')}}"/>
                            </div>


                            <div class="form-group">
                                <label for="edad">Edad</label>
                                <input type="number" id="edad" name="edad" class="form-control" value="{{old('edad', $registro->edad ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="id_genero">Seleccione género</label>
                                <select id="id_genero" name="id_genero" name="id_genero" class="form-control">
                                    @if (count($listadoGenero))
                                            @foreach($listadoGenero as $item)
                                                <option
                                                    {{$registro->id_genero == $item->id ? 'selected': ''}}
                                                    value="{{$item->id}}">{{$item->genero}}
                                                </option>
                                            @endforeach
                                            @elseif ($listadoGenero != '')
                                                <option value="">No se encuentró ningún registro</option>
                                            @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Actualizar Registro">
                                <a href=" {{ route('page.Pasajeros') }} " class="btn btn-success">Cancelar</a>
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
