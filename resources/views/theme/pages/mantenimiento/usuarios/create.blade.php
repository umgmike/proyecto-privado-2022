@extends("theme.$theme.layout")

@section('Title')
  Registro de usuarios
@endsection

@section("scripts")
  <script src="{{asset("assets/pages/bloques/bloques.js")}}" type="text/javascript"></script>
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
            <form action=" {{ route('page.save.Usuarios') }} " id="GuardarUsuario" method="POST" autocomplete="off">
              @csrf




                <div class="card card-default">
                    <div class="ribbon-wrapper ribbon-sm">
                        <div class="ribbon bg-info">
                            Crear
                        </div>
                    </div>
                    <a href="" class="btn btn-info btn-block "></a>

                    <div class="card-header">
                        <h3 class="card-title">Formulario de usuarios </h3>
                    </div>

                    <div class="card-body p-0">
                      <div class="bs-stepper linear">
                        <div class="bs-stepper-header" role="tablist">
                          <!-- your steps here -->
                          <div class="step active" data-target="#logins-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger" aria-selected="true">
                              <span class="bs-stepper-circle">1</span>
                              <span class="bs-stepper-label">Logins</span>
                            </button>
                          </div>
                          <div class="line"></div>
                          <div class="step" data-target="#information-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger" aria-selected="false" disabled="disabled">
                              <span class="bs-stepper-circle">2</span>
                              <span class="bs-stepper-label">Various information</span>
                            </button>
                          </div>
                        </div>
                        <div class="bs-stepper-content">
                          <!-- your steps content here -->
                          <div id="logins-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="logins-part-trigger">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
                              </div>

                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                          </div>
                          <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                            <div class="form-group">
                              <label for="exampleInputFile">File input</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
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
