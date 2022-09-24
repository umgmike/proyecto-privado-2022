@extends("theme.$theme.layout")

@section('Title')
  Registro de usuarios
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/bloques/bloques.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fa fa-user-graduate"> Creación <strong> @yield('Title') </strong> </i>
          </h4>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid offset-md-3">

        <div class="col-md-5">
          <div class="container-fluid">
            <form action="" id="GuardarUsuario" method="POST" autocomplete="off">
              @csrf
              <div class="card">

                <div class="ribbon-wrapper ribbon-sm">
                  <div class="ribbon bg-info">
                    Crear
                  </div>
                </div>
                <a href="" class="btn btn-info btn-block "></a>

                <div class="card-body row">
                    <div class="col-11">

                        <div class="form-group">
                            <label>Seleccione Rol : </label>
                            <select name="id_rol" class="form-control">
                                @foreach($roles as $r)
                                    <option value="{{$r->id}}">{{ $r->rol }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombres : </label>
                            <input type="text" id="nombre" name="nombre" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellidos : </label>
                            <input type="text" id="apellido" name="apellido" class="form-control" />
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Guardar Registro">
                            <a href="{{ route('page.usuarios') }}" class="btn btn-success">Cancelar</a>
                        </div>

                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </section>
@endsection
