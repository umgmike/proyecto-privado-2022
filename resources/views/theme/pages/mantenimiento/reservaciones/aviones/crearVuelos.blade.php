@extends("theme.$theme.layout")

@section('Title')
  Catálogo de Reservaciones
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <h4>
                    <i class="fa fa-book"><strong>@yield('Title') </strong> </i>
                </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src=" {{ asset("uza/img/core-img/logoEsteban.ico") }} "
                                    alt="User profile picture">
                            </div>

                            <div>
                                <h3 class="profile-username text-center"> <strong style="font-size: 80px;">{{ old('capacidad', $registro->capacidad ?? '') }} </strong></h3>
                                <p class="text-muted text-center">Capacidad del avión : <strong>{{ old('capacidad', $registro->nombre_avion ?? '') }}</strong></p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-info">
                            Crear registro boletos
                            </div>
                        </div>
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#boletosVenta" data-toggle="tab">Boleto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">

                                <div class="active tab-pane" id="boletosVenta">
                                    <form action=" {{ route('page.save.Aviones.save') }}" id="GuardarBoletos" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">

                                                            <div class="card-body row">
                                                                <div class="col-3 text-center d-flex align-items-center justify-content-center">
                                                                    <div class="image">
                                                                        <img src=" {{ asset("uza/img/core-img/logoInicial.ico") }} " alt="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-5">

                                                                    <div class="form-group">
                                                                        <label for="id_avion">Avion : </label>
                                                                        <select id="id_avion" name="id_avion" class="form-control" readonly>
                                                                        @if (count($listadoAviones))
                                                                            @foreach($listadoAviones as $item)
                                                                                <option
                                                                                    {{$registro->id == $item->id ? 'selected': ''}}
                                                                                    value="{{$item->id}}">{{$item->nombre_avion}}
                                                                                </option>
                                                                            @endforeach
                                                                        @elseif ($listadoAviones != '')
                                                                            <option value="">No se encuentró ningún registro</option>
                                                                        @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="id_pasajero">Seleccione pasajero : </label>
                                                                        <select id="id_pasajero" name="id_pasajero" class="form-control select2">
                                                                            @if (count($listadoPasajero))
                                                                                @foreach($listadoPasajero as $item)
                                                                                    <option value="{{$item->id}}">{{ $item->nombre }} {{ $item->apellido }}</option>
                                                                                @endforeach
                                                                            @elseif ($listadoPasajero != '')
                                                                                <option value="">No se encuentró ningún registro</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="id_clase">Seleccione clase para vuelo : </label>
                                                                        <select id="id_clase" name="id_clase" class="form-control" onchange="ShowSelected(this.value);">
                                                                        @if (count($listadoClase))
                                                                            @foreach($listadoClase as $item)
                                                                                <option value="{{$item->id}}">{{ $item->clase }}</option>
                                                                            @endforeach
                                                                        @elseif ($listadoClase != '')
                                                                            <option value="">No se encuentró ningún registro</option>
                                                                        @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="precio">Precio Boleto : </label>
                                                                        <input type="number" id="precio" name="precio" class="form-control" value = "0.00" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="cantidad">Cantidad de Boletos : </label>
                                                                        <input type="number" id="cantidad" name="cantidad" class="form-control" onchange="sumar(this.value);">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="total">Total : </label>
                                                                        <input type="number" id="total" name="total" class="form-control" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="id_pais_origen">Seleccione pais origen : </label>
                                                                        <select id="id_pais_origen" name="id_pais_origen" class="form-control">
                                                                            @if (count($listadoPais))
                                                                                @foreach($listadoPais as $item)
                                                                                    <option value="{{$item->id}}">{{ $item->pais }}</option>
                                                                                @endforeach
                                                                            @elseif ($listadoPais != '')
                                                                                <option value="">No se encuentró ningún registro</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="id_pais_destino">Seleccione pais destino : </label>
                                                                        <select id="id_pais_destino"name="id_pais_destino" class="form-control">
                                                                            @if (count($pais_destino))
                                                                                @foreach($pais_destino as $item)
                                                                                    <option value="{{$item->id}}">{{ $item->pais }}</option>
                                                                                @endforeach
                                                                            @elseif ($pais_destino != '')
                                                                                <option value="">No se encuentró ningún registro</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="id_ciudad_destino">Seleccione ciudad : </label>
                                                                        <select id="id_ciudad_destino" name="id_ciudad_destino" class="form-control">
                                                                            @if (count($listadoDepartamento))
                                                                                @foreach($listadoDepartamento as $item)
                                                                                    <option value="{{$item->id}}">{{ $item->nombre }}</option>
                                                                                @endforeach
                                                                            @elseif ($listadoDepartamento != '')
                                                                                <option value="">No se encuentró ningún registro</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="direccion">Direccion destino: </label>
                                                                        <textarea name="direccion" id="direccion" class="form-control" rows="3"></textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="motivo">Motivo vuelo : </label>
                                                                        <textarea name="motivo" id="motivo" class="form-control" rows="3"></textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="fecha_inicio">Fecha Salida : </label>
                                                                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="fecha_fin">Fecha llegada : </label>
                                                                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="submit" class="btn btn-primary" value="Guardar Registro">
                                                                        <a href=" {{ route('page.Aviones') }} " class="btn btn-success">Cancelar</a>
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

                                <div class="tab-pane" id="timeline">
                                </div>

                                <div class="tab-pane" id="settings">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("scriptsAdicionales")
    <script type="text/javascript">

        function ShowSelected(value)
        {
            var cod = document.getElementById("id_clase").value;
            var combo = document.getElementById("id_clase");
            var selected = combo.options[combo.selectedIndex].text;

            if (selected == "<--- Seleccione una opción --->") {
                var vacio = 0;
                var sin_precio = parseFloat(vacio)
                document.getElementById('precio').value = (sin_precio.toFixed(2));

            }else if (selected == "Primera clase") {
                var primera_clase = 550;
                var precio1raClase = parseFloat(primera_clase)
                document.getElementById('precio').value = (precio1raClase.toFixed(2));
            } else if (selected == "Clase ejecutiva o business") {
                var primera_clase = 350;
                var precioEjecutivo = parseFloat(primera_clase)
                document.getElementById('precio').value = (precioEjecutivo.toFixed(2));

            }else if (selected == "Clase premium economy") {
                var primera_clase = 250;
                var precioPremium = parseFloat(primera_clase)
                document.getElementById('precio').value = (precioPremium.toFixed(2));

            }else if (selected == "Clase turista o económica") {
                var primera_clase = 150;
                var precioTurista= parseFloat(primera_clase)
                document.getElementById('precio').value = (precioTurista.toFixed(2));
            }
        }

        function sumar (valor) {
            var total = 0;
            valor = document.getElementById('precio').value;

            total = document.getElementById('total').value;
            cantidad = document.getElementById('cantidad').value;
            total = (total == null || total == undefined || total == "") ? 0 : total;
            var y = parseFloat(valor);
            total = (cantidad) * (y);
            var precioTotal = parseFloat(total)
            document.getElementById('total').value = ((precioTotal).toFixed(2));
        }

    </script>
@endsection

