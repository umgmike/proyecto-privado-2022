<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('Title','Welcome') | E.O.U.M No. 72 "Guatemaltecos Somos" </title>
        <link rel="icon" href="{{ asset('uza/img/core-img/favicon.ICO') }} ">

        <link rel="stylesheet" href="{{ asset('uza/style.css') }} ">
    </head>
    <body>
        <div id="preloader">
            <div class="wrapper">
                <div class="cssload-loader"></div>
            </div>
        </div>

        @include('nav-bar')

        <!-- ***** Welcome Area Start ***** -->
        <section class="welcome-area">
            <div class="welcome-slides owl-carousel">

                <!-- Single Welcome Slide -->
                <div class="single-welcome-slide">

                    <!-- Welcome Content -->
                    <div class="welcome-content h-75">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <!-- Welcome Text -->
                                <div class="col-12 col-md-6">
                                    <div class="welcome-text">
                                        <h2 >Bienvenido <br></h2>
                                        @if (Route::has('login'))
                                            @auth
                                                <h5 >Usted ya se encuentra logueado
                                                    <strong>"{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}"</strong>
                                                </h5>
                                            @else
                                                <h5 >AEREOPUERTO "LA AURORA"</h5>
                                            @endauth
                                        @endif
                                        @if (Route::has('login'))
                                            @auth
                                                <a href="{{ url('home') }}" class="btn uza-btn btn-2">Home</a>
                                            @else
                                                <a href="{{ route('login') }}" class="btn uza-btn btn-2"> Login</a>
                                            @endauth
                                        @endif
                                    </div>
                                </div>
                                <!-- Welcome Thumbnail -->
                                <div class="col-12 col-md-6">
                                    <div class="welcome-thumbnail">
                                        <img src="{{ asset('uza/img/bg-img/bienvenida.png') }} " alt="" data-animation="slideInRight" data-delay="400ms">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <!-- ***** Welcome Area End ***** -->

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
