<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Boleto;
use App\Models\Clase;
use App\Models\Pasajero;

use DB;
use Alert;
use Carbon\Carbon;

class VuelosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVuelos()
    {
        $sql = '
            SELECT
                b.id,
                CONCAT(p.nombre, " ", p.apellido) AS nombre_completo,
                c.clase,
                b.ticket,
                b.cantidad,
                b.precio,
                b.total,
                b.estado,
                b.motivo
            FROM boleto b
            INNER JOIN pasajero p ON (b.id_pasajero = p.id)
            INNER JOIN clase c ON (b.id_clase = c.id)';

        $vuelos = DB::select($sql);

        return view('theme.pages.mantenimiento.reservaciones.vuelos.index', compact('vuelos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearVuelos()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function grabarRegistro(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarRegistro($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRegistro(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivarVuelos($id)
    {
        //
    }
}
