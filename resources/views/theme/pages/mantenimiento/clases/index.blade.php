@extends("theme.$theme.layout")

@section('Title')
  Clases
@endsection

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fa fa-user-graduate"> Catálogo de <strong> @yield('Title') </strong> </i>
          </h4>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
          <div class="card">
            <a href="" class="btn btn-info btn-block "></a>
            <div class="ribbon-wrapper ribbon-sm">
              <div class="ribbon bg-info">
                Clases
              </div>
            </div><br>

            <div class="card-header">
                <a href=" {{ route('page.create.clases') }} " class="btn btn-info tooltipsC" title="Crear registro del @yield('Title')">
                  <i class="fa fa-fw fa-plus-circle"></i> Crear registro de @yield('Title')
                </a>
              </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Clase de vuelo</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificación</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($clases as $rs)
                    <tr>
                        <td>{{ $rs->clase}}</td>
                        <td>{{ $rs->created_at }}</td>
                        <td>{{ $rs->updated_at }}</td>
                        <td>
                            <a href="{{ route('page.edit.clases', ['id' => $rs->id])}}"´class="tooltipsC" title="Editar registro">
                                <i class="fa fa-edit btn btn-outline-info btn-xs"></i>
                            </a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>

    </div>
  </section>
@endsection
