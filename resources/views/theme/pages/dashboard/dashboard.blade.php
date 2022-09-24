@extends("theme.$theme.layout")

@section('Title')
  Dashboard
@endsection

@section('content')
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h4>
            @if (Auth::user()->id_genero == 2)
              <i class="fa fa-user-graduate"> Bienvenida : <strong> {{ Auth::User()->nombres }} {{ Auth::User()->apellidos }}.</strong> </i>
            @elseif (Auth::user()->id_genero == 1)
              <i class="fa fa-user-graduate"> Bienvenido : <strong> {{ Auth::User()->nombres }} {{ Auth::User()->apellidos }}.</strong> </i>
            @endif
          </h4>
        </div>
      </div>
    </div>
  </section>

@endsection
