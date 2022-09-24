<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('Title','Welcome') | AEREOPUERTO LA AURORA </title>
    <link rel="icon" href="{{ asset('uza/img/core-img/favicon.ico') }} ">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset("assets/$theme/plugins/fontawesome-free/css/all.min.css") }} ">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=" {{ asset("assets/$theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset("assets/$theme/dist/css/adminlte.min.css") }} ">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }} ">
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }} ">
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }} ">

    @yield("styles")

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  </head>
  <body class="sidebar-mini layout-fixed layout-footer-fixed control-sidebar-slide-open sidebar-closed sidebar-collapse">

    <div class="wrapper">
      <!-- inicio navbar -->
      @include("theme/$theme/nav-bar")
      <!-- fin navbar -->

      <!-- inicio aside -->
      @include("theme/$theme/aside")
      <!-- fin aside -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content">
          <br>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <h4>
                    @yield('head')
                  </h4>
                </div>
              </div>
            </div>
          </section>

          <main class="py-0">
            @yield('content')
          </main>

        </section>
      </div>
      <!-- /.content-wrapper -->

      <!-- inicio footer -->
      @include("theme/$theme/footer")
      <!-- fin footer -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset("assets/$theme/plugins/jquery/jquery.min.js") }} "></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js") }} "></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-buttons/js/dataTables.buttons.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/jszip/jszip.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/pdfmake/pdfmake.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/pdfmake/vfs_fonts.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-buttons/js/buttons.html5.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-buttons/js/buttons.print.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-buttons/js/buttons.colVis.min.js") }} "></script>
    <!-- AdminLTE App -->
    <script src="{{ asset("assets/$theme/dist/js/adminlte.min.js") }} "></script>

    @yield("scriptsPlugins")
    <script src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset("assets/js/scripts.js")}}"></script>
    <script src="{{asset("assets/js/funciones.js")}}"></script>
    @yield("scripts")

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "processing": true,
          "lengthChange": false,
          "autoWidth": false,
          "paging": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "buttons": ["csv", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
    </script>

  </body>
</html>
