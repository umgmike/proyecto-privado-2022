@extends("theme.$theme.layout")

@section('Title')
	Editar usuario
@endsection

@section("scripts")
    <script src="{{asset("assets/pages/scripts/admin/usuario/create.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/admin/usuario/create2.js")}}" type="text/javascript"></script>
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

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 offset-1">
            <div class="card">
                <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-primary">
                    Editar registro roles
                    </div>
                </div>
                <a href="" class="btn btn-info btn-block "></a>
                <div class="card-body row">
                    <div class="col-3 text-center d-flex align-items-center justify-content-center">
                    <div class="image">
                        <img src=" {{ asset("uza/img/core-img/logoInicial.ico") }} " alt="">
                    </div>
                    </div>

                    <form action=" {{route('page.update.Usuarios', [$registro->id])}}" id="GuardarUsuarios" method="POST" autocomplete="off">
                        @csrf
                        @method("put")
                        <div class="col-12">
                            <div class="form-group">
                                <label for="id_rol">Seleccione rol</label>
                                <select id="id_rol" name="id_rol" class="form-control select2">
                                    @if (count($listadoRoles))
                                            @foreach($listadoRoles as $item)
                                                <option
                                                    {{$registro->id_rol == $item->id ? 'selected': ''}}
                                                    value="{{$item->id}}">{{$item->rol}}
                                                </option>
                                            @endforeach
                                            @elseif ($listadoRoles != '')
                                                <option value="">No se encuentró ningún registro</option>
                                            @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nombre">Editar Nombres : </label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre', $registro->nombre ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="apellidos">Editar Apellidos : </label>
                                <input type="text" id="apellidos" name="apellido" class="form-control" value="{{old('apellido', $registro->apellido ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="id_genero">Seleccione género</label>
                                <select id="id_genero" name="id_genero" class="form-control select2">
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
                                <label for="telefono">Editar Teléfono : </label>
                                <input type="text" id="telefono" name="telefono" class="form-control" value="{{old('telefono', $registro->telefono ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <label for="usuario">Editar Usuario : </label>
                                <input type="text" id="usuario" name="usuario" class="form-control" value="{{old('usuario', $registro->usuario ?? '')}}"/>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-outline-danger mt-40" id="btn_cambiar">Desea cambiar contraseña?</button>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Actualizar Registro">
                                <a href=" {{ route('page.usuarios') }} " class="btn btn-success">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>



        <div class="col-12 col-lg-4 offset-1" id="verificando_pass">
            <div class="card">
                <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-primary">
                    Editar registro roles
                    </div>
                </div>
                <a href="" class="btn btn-info btn-block "></a>
                <div class="card-body row">

                    <form action=" {{route('page-update.users-pass', [$registro->id])}}" id="GuardarUsuarios2" method="POST" autocomplete="off">
                        @csrf
                        @method("put")
                        <div class="col-12">

                            <div class="form-group">
                                <label for="password" class="col-form-label {{!isset($registro) ? 'required' : ''}}">Nueva Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese nueva password" value="" {{!isset($registro) ? 'required' : ''}} minlength="8">
                            </div>


                            <div class="form-group">
                                <label for="re_password" class="col-form-label {{!isset($registro) ? 'required' : ''}}">Confirme contraseña</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Repita contraseña" value="" {{!isset($registro) ? 'required' : ''}} minlength="8">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Actualizar Registro">
                                <a href=" {{ route('page.usuarios') }} " class="btn btn-success">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scriptsAdicionales')
    <script type="text/javascript">
        $("#verificando_pass").hide();


        $('#btn_cambiar').click(function () {
            $("#verificando_pass").show();

        });

        $('#btn_cancelar').click(function () {
            $("#verificando_pass").hide();

        });
    </script>
@endsection
