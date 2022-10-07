<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('Title','Welcome') | AEROPUERTO "LA AURORA" </title>
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

    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/daterangepicker/daterangepicker.css") }} ">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }} ">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css") }} ">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }} ">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/select2/css/select2.min.css") }} ">
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }} ">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css") }} ">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/bs-stepper/css/bs-stepper.min.css") }} ">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/dropzone/min/dropzone.min.css") }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/adminlte.min.css") }} ">

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js" integrity="sha512-ju6u+4bPX50JQmgU97YOGAXmRMrD9as4LE05PdC3qycsGQmjGlfm041azyB1VfCXpkpt1i9gqXCT6XuxhBJtKg==" crossorigin="anonymous"></script>

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

    <!-- Select2 -->
    <script src="{{ asset("assets/$theme/plugins/select2/js/select2.full.min.js") }} "></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset("assets/$theme/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js") }} "></script>
    <!-- InputMask -->
    <script src="{{ asset("assets/$theme/plugins/moment/moment.min.js") }} "></script>
    <script src="{{ asset("assets/$theme/plugins/inputmask/jquery.inputmask.min.js") }} "></script>
    <!-- date-range-picker -->
    <script src="{{ asset("assets/$theme/plugins/daterangepicker/daterangepicker.js") }} "></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset("assets/$theme/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js") }} "></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset("assets/$theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }} "></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset("assets/$theme/plugins/bootstrap-switch/js/bootstrap-switch.min.js") }} "></script>
    <!-- BS-Stepper -->
    <script src="{{ asset("assets/$theme/plugins/bs-stepper/js/bs-stepper.min.js") }} "></script>
    <!-- dropzonejs -->
    <script src="{{ asset("assets/$theme/plugins/dropzone/min/dropzone.min.js") }} "></script>
    <!-- AdminLTE App -->
    <script src="{{ asset("assets/$theme/dist/js/adminlte.min.js") }} "></script>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    @yield("scriptsPlugins")
    <script src="{{ asset('assets/lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset("assets/js/scripts.js")}}"></script>
    <script src="{{ asset("assets/js/funciones.js")}}"></script>
    @yield("scripts")


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

    <script>
        $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
            format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
            ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
            },
            function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

        });
    </script>

    @yield("scriptsAdicionales")

  </body>
</html>
