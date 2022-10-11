@extends("theme.$theme.layout")

@section('Title')
  Edición de clases de vuelos
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/scripts/admin/clases/create.js")}}" type="text/javascript"></script>
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
            <form action="{{route('page.update.clases', [$registro->id])}}" id="GuardarClases" method="POST" autocomplete="off">
                @csrf
                @method("put")
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="row">
                        <div class="col-12">
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

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="clase">Editar clases de vuelo : </label>
                                        <input type="text" id="clase" name="clase" class="form-control" value="{{old('clase', $registro->clase ?? '')}}"/>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Actualizar Registro">
                                        <a href=" {{ route('page.clases') }} " class="btn btn-success">Cancelar</a>
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
