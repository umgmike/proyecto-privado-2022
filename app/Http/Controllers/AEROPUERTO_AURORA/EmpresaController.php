<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empresa;

use DB;
use Alert;

class EmpresaController extends Controller
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
    public function getEmpresas()
    {
        $sql = '
            SELECT
                id,
                empresa,
                created_at,
                updated_at
            FROM empresa';

        $empresas = DB::select($sql);
        return view('theme.pages.mantenimiento.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearEmpresas()
    {
        return view('theme.pages.mantenimiento.empresas.create');
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
            $registro = new Empresa();
            $registro->empresa = $request->empresa;
            $registro->save();
            DB::commit();
            toast('Registro almacenado con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([EmpresaController::class, 'getEmpresas']);
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
        $data['registro'] = Empresa::findOrFail($id);
        return view('theme.pages.mantenimiento.empresas.edit', $data);
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
            $registro = Empresa::findOrFail($id);
            $registro->empresa = $request->empresa;
            $registro->save();
            DB::commit();
            toast('Empresa: '.$registro->empresa.' '. ' Se actualizó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([EmpresaController::class, 'getEmpresas']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('Empresa : '.$registro->empresa.' '. 'No se pudo actualizar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
    }

}
