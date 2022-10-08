@extends("theme.$theme.layout")

@section('Title')
  Reservaciones
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <h4>
                    <i class="nav-icon far fa-calendar-alt"> Catálogo de <strong> @yield('Title') </strong> </i>
                </h4>
                </div>
            </div>
        </div>
    </section>
@endsection
