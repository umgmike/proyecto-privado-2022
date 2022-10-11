<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Pasajero;
use App\Models\Pais;
use App\Models\Genero;
use App\Models\Departamento;
use App\Models\Clase;
use App\Models\Empresa;
use App\Models\Boleto;
use App\Models\Avion;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function HomeAdmin()
    {

        $datos['conteoUsuarios'] = Usuario::orderBy('id', 'DESC')->get();
        $datos['conteoRol'] = Rol::orderBy('id', 'DESC')->get();
        $datos['conteoPasajero'] = Pasajero::orderBy('id', 'DESC')->get();
        $datos['conteoPais'] = Pais::orderBy('id', 'DESC')->get();
        $datos['conteoGenero'] = Genero::orderBy('id', 'DESC')->get();
        $datos['conteoDepartamento'] = Departamento::orderBy('id', 'DESC')->get();
        $datos['conteoClase'] = Clase::orderBy('id', 'DESC')->get();
        $datos['conteoEmpresa'] = Empresa::orderBy('id', 'DESC')->get();
        $datos['conteoBoleto'] = Boleto::orderBy('id', 'DESC')->get();
        $datos['conteoAvion'] = Avion::orderBy('id', 'DESC')->get();
        return view('theme.pages.dashboard.dashboard', compact('datos'));
    }
}

