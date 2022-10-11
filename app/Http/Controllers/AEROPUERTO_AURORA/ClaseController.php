<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clase;

use DB;
use Alert;

class ClaseController extends Controller
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
    public function getClases()
    {

        $sql = '
            SELECT
                id,
                clase,
                created_at,
                updated_at
            FROM clase
            WHERE id !=  1';

        $clases = DB::select($sql);
        return view('theme.pages.mantenimiento.clases.index', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearClases()
    {
        return view('theme.pages.mantenimiento.clases.create');
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
            $registro = new Clase();
            $registro->clase = $request->clase;
            $registro->save();
            DB::commit();
            toast('Registro almacenado con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([ClaseController::class, 'getClases']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('Registro no almacenado' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarRegistro($id)
    {
        $data['registro'] = Clase::findOrFail($id);
        return view('theme.pages.mantenimiento.clases.edit', $data);
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
        DB::beginTransaction();
        try
        {
            $registro = Clase::findOrFail($id);
            $registro->clase = $request->clase;
            $registro->save();
            DB::commit();
            toast('Clase: '.$registro->clase.' '. ' Se actualizó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([ClaseController::class, 'getClases']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('Clase : '.$registro->clase.' '. 'No se pudo actualizar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
    }
}
