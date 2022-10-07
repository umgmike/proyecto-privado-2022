@extends("theme.$theme.layout")

@section('Title')
  Crear registro boletos
@endsection

@section("scripts")
    <script src="{{asset("assets/pages/scripts/admin/boleto/create.js")}}" type="text/javascript"></script>
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

    @include('includes.form-error')
    @include('includes.mensaje')

    <section class="content">
        <div class="container-fluid">
            <form action=" {{ route('page.save.boleto') }}" id="GuardarBoletos" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                <div class="ribbon-wrapper ribbon-xl">
                                    <div class="ribbon bg-info">
                                    Crear registro boletos
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
                                                <label for="id_pasajero">Seleccione pasajero : </label>
                                                <select id="id_pasajero" name="id_pasajero" name="id_pasajero" class="form-control">
                                                    @if (count($pasajero))
                                                        @foreach($pasajero as $item)
                                                            <option value="{{$item->id}}">{{ $item->nombre }} {{ $item->apellido }}</option>
                                                        @endforeach
                                                    @elseif ($pasajero != '')
                                                        <option value="">No se encuentró ningún registro</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="id_clase">Seleccione clase para vuelo : </label>
                                                <select id="id_clase" name="id_clase" name="id_clase" class="form-control" onchange="ShowSelected(this.value);">
                                                @if (count($clase))
                                                    @foreach($clase as $item)
                                                        <option value="{{$item->id}}">{{ $item->clase }}</option>
                                                    @endforeach
                                                @elseif ($clase != '')
                                                    <option value="">No se encuentró ningún registro</option>
                                                @endif
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="ticket">Número de Boleto : </label>
                                                <input type="number" id="ticket" name="ticket" class="form-control" value =
                                                @if (count($rel_ticket))
                                                    @foreach($rel_ticket as $item)
                                                    @endforeach
                                                    {{ $item->ticket += 89100 }}
                                                @else
                                                    {{ 89100 }}
                                                @endif readonly>
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
                                                <label for="motivo">Motivo vuelo : </label>
                                                <textarea name="motivo" id="motivo" class="form-control" rows="3"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Guardar Registro">
                                                <a href=" {{ route('page.boleto') }} " class="btn btn-success">Cancelar</a>
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
