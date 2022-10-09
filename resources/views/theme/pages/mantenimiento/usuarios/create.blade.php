@extends("theme.$theme.layout")

@section('Title')
  Crear registro usuario
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/scripts/admin/usuario/create.js")}}" type="text/javascript"></script>
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
            <form action=" {{ route('page.save.Usuarios') }}" id="GuardarUsuarios" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">

                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger">
                            Crear registro usuarios
                            </div>
                        </div>
                        <a href="" class="btn btn-warning btn-block "></a>
                        <div class="card-body row">
                            <div class="col-3 text-center d-flex align-items-center justify-content-center">
                                <div class="image">
                                    <img src=" {{ asset("uza/img/core-img/logoInicial.ico") }} " alt="">
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <label for="id_rol" class="control-label">Seleccione rol</label>
                                    <div class="input-group input-group-sm">
                                        <select name="id_rol"  class="form-control select2 tooltipsC"  title="Seleccione rol">
                                            @if (count($roles))
                                                @foreach($roles as $item)
                                                    <option value="{{$item->id}}">{{$item->rol}}</option>
                                                @endforeach
                                            @elseif ($roles != '')
                                                <option value="">No se encuentró ningún registro</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <label for="nombre" class="control-label">Nombre Usuario: </label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $item->nombre ?? '')}}">
                                </div>

                                <div class="form-group" >
                                    <label for="apellido" class="control-label">Apellido Usuario: </label>
                                    <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido', $item->apellido ?? '')}}">
                                </div>

                                <div class="form-group">
                                    <label for="id_genero" class="control-label">Seleccione género</label>
                                    <div class="input-group input-group-sm">
                                        <select name="id_genero"  class="form-control select2 tooltipsC"  title="Seleccione rol">
                                            @if (count($genero))
                                                @foreach($genero as $item)
                                                    <option value="{{$item->id}}">{{$item->genero}}</option>
                                                @endforeach
                                            @elseif ($genero != '')
                                                <option value="">No se encuentró ningún registro</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <label for="telefono" class="control-label">Teléfono Usuario: </label>
                                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{old('telefono', $item->telefono ?? '')}}" data-inputmask='"mask": "9999-9999"' data-mask placeholder="Ingrese teléfono">
                                </div>

                                <div class="form-group" >
                                    <label for="usuario" class="control-label">Usuario: </label>
                                    <input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario', $item->usuario ?? '')}}">
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-form-label {{!isset($item) ? 'required' : ''}}">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese contraseña" value="" {{!isset($item) ? 'required' : ''}} minlength="8" value="{{old('password', $item->password ?? '')}}">
                                </div>

                                <div class="form-group">
                                    <label for="re_password" class="col-form-label {{!isset($item) ? 'required' : ''}}">Confirme contraseña</label>
                                    <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Repita contraseña" value="" {{!isset($item) ? 'required' : ''}} minlength="8">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning" value="Guardar Registro">
                                    <a href=" {{ route('page.usuarios') }} " class="btn btn-danger">Cancelar</a>
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
