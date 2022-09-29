@extends("theme.$theme.layout")

@section('Title')
  Crear registro pasajeros
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
                    <i class="fa fa-users"><strong> @yield('Title') </strong> </i>
                </h4>
                </div>
            </div>
        </div>
    </section>

    @include('includes.form-error')
    @include('includes.mensaje')

    <section class="content">
        <div class="container-fluid">
            <form action=" {{ route('page.save.Pasajeros') }}" id="GuardarPasajeros" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">

                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-info">
                            Crear registro pasajeros
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
                                    <label for="nombre">Nombres : </label>
                                    <input type="text" id="nombre" name="nombre" class="form-control"  placeholder="Ingrese nombres" value="{{old('nombre', $item->nombre ?? '')}}">
                                </div>

                                <div class="form-group">
                                    <label for="apellido">Apellidos : </label>
                                    <input type="text" id="apellido" name="apellido" class="form-control"  placeholder="Ingrese apellidos" value="{{old('apellido', $item->apellido ?? '')}}">
                                </div>

                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control" data-inputmask='"mask": "9999-9999"' data-mask placeholder="Ingrese teléfono" value="{{old('telefono', $item->telefono ?? '')}}">
                                </div>

                                <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input type="number" id="edad" name="edad" class="form-control"  placeholder="Ingrese edad" value="{{old('edad', $item->edad ?? '')}}">
                                </div>

                                <div class="form-group">
                                    <label for="dpi">DPI</label>
                                    <input type="text" id="dpi" name="dpi" class="form-control" data-inputmask='"mask": "9999 99999 9999"' data-mask placeholder="Ingrese DPI" value="{{old('dpi', $item->dpi ?? '')}}">
                                </div>

                                <div class="form-group">
                                    <label for="id_genero">Seleccione género</label>
                                    <select id="id_genero" name="id_genero" name="id_genero" class="form-control">
                                    @if (count($genero))
                                        @foreach($genero as $item)
                                            <option value="{{$item->id}}">{{ $item->genero }}</option>
                                        @endforeach
                                    @elseif ($genero != '')
                                        <option value="">No se encuentró ningún registro</option>
                                    @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Guardar Registro">
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
