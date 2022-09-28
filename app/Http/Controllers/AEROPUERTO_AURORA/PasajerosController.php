<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasajero;
use App\Models\Genero;

use DB;
use Alert;

class PasajerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPasajeros()
    {

        $sql = '
            SELECT
            p.id,
            CONCAT(p.nombre, " ", p.apellido) AS nombre_completo,
            p.telefono,
            p.dpi,
            p.edad,
            g.genero
        FROM pasajero p
        INNER JOIN genero g ON (p.id_genero = g.id)';

        $pasajeros = DB::select($sql);

        return view('theme.pages.mantenimiento.pasajeros.index', compact('pasajeros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearPasajeros()
    {
        $genero = Genero::all();
        return view('theme.pages.mantenimiento.pasajeros.create', compact('genero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function grabarRegistro(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $registro = new Pasajero();
            $registro->nombre = $request->nombre;
            $registro->apellido = $request->apellido;
            $registro->telefono = $request->telefono;
            $registro->dpi = $request->dpi;
            $registro->edad = $request->edad;
            $registro->id_genero = $request->id_genero;
            $registro->save();
            DB::commit();
            toast('El pasajero: '.$registro->nombre.' '.$registro->apellido.' '. 'Se almacenó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([PasajerosController::class, 'getPasajeros']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('El pasajero de : '.$registro->nombre.' '.$registro->apellido.' '. 'No se pudo insertar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
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
