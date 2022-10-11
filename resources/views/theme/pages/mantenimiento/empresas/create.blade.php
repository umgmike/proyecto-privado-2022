@extends("theme.$theme.layout")

@section('Title')
  Crear registro empresas
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/scripts/admin/empresas/create.js")}}" type="text/javascript"></script>
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
            <form action=" {{ route('page.save.empresas') }}" id="GuardarEmpresas" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">

                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-info">
                            Crear registro empresas
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
                                    <label for="empresa">Empresa de vuelo : </label>
                                    <input type="text" id="empresa" name="empresa" class="form-control"  placeholder="Ingrese empresa">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Guardar Registro">
                                    <a href=" {{ route('page.empresas') }} " class="btn btn-success">Cancelar</a>
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
