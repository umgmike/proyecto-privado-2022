<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aeropuerto LA AURORA</title>
        <link rel="icon" href="{{ asset('uza/img/core-img/favicon.ico') }} ">

        <link rel="stylesheet" href="{{ asset('uza/style.css') }} ">
    </head>
    <body>
        <div id="preloader">
            <div class="wrapper">
                <div class="cssload-loader"></div>
            </div>
        </div>

        @include('nav-bar')

        <div style="padding-top: 150px;">
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="single-blog-post">
                            <div class="card-header" style="font-size: 20px; color:#DFDEDE; background: white">
                                <img src="{{ asset("uza/img/core-img/logoEsteban.ico") }}" alt="">
                                <div class="text-center">
                                    <b><p>Control de acceso</p></b>
                                </div>
                            </div>

                        <div class="card-body">
                            <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-gray-light">Login</div>
                                </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Usuario : ') }}</label>

                                    <div class="col-md-6">
                                        <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario" autofocus>

                                        @error('usuario')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password : ') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-outline-primary">
                                            {{ __('Ingresar al sistema') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="text-center" style="color: #DFDEDE">
                                Copyrights &copy;<script>document.write(new Date().getFullYear());</script> All     rights reserved | EOUM No. 72 "Guatemaltecos Somos"
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src=" {{ asset('uza/js/jquery.min.js') }}"></script>
        <!-- Popper js -->
        <script src=" {{ asset('uza/js/popper.min.js') }}"></script>
        <!-- Bootstrap js -->
        <script src=" {{ asset('uza/js/bootstrap.min.js') }}"></script>
        <!-- All js -->
        <script src=" {{ asset('uza/js/uza.bundle.js') }}"></script>
        <!-- Active js -->
        <script src=" {{ asset('uza/js/default-assets/active.js') }}"></script>
    </body>
</html>
