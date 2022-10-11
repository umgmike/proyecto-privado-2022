<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use PDF;

class ReportesController extends Controller
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
    public function boletosCancelados()
    {
        $boletosCancelados = DB::table('boleto AS bol')
			->join('avion AS av', 'bol.id_avion', '=', 'av.id')
            ->join('pasajero AS pas', 'bol.id_pasajero', '=', 'pas.id')
            ->join('clase AS cla', 'bol.id_clase', '=', 'cla.id')
            ->join('pais AS pa', 'bol.id_pais_origen', '=', 'pa.id')
            ->join('pais AS passs', 'bol.id_pais_destino', '=', 'passs.id')
			->select(
				'av.nombre_avion',
                'pas.nombre',
                'pas.apellido',
				'bol.estado',
                'cla.clase',
                'pa.pais AS origen',
                'passs.pais AS destino',

			)
			->orderBy('bol.id', 'ASC')
			->where('bol.estado', '=', '0')->get();

		$pdf = PDF::loadView('theme.pages.mantenimiento.reportes.boletosCancelados', compact('boletosCancelados'));
		return $pdf->stream('Aeropuerto "LA AURORA".pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
