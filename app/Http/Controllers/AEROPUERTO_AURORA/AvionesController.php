<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Avion;
use App\Models\Empresa;

use DB;
use Alert;
use Carbon\Carbon;

class AvionesController extends Controller
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
    public function getAviones()
    {
        $sql = '
            SELECT
                a.id,
                a.codigo,
                a.nombre_avion,
                e.empresa,
                a.capacidad,
                a.estado_vuelo
            FROM avion a
            INNER JOIN empresa e ON (a.id_empresa = e.id)';

        $aviones = DB::select($sql);

        return view('theme.pages.mantenimiento.reservaciones.aviones.index', compact('aviones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearAviones()
    {
        $empresa = Empresa::all();
        return view('theme.pages.mantenimiento.reservaciones.aviones.create', compact('empresa'));
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
            $registro = new Avion();
            $estado_actual = 'En Espera';
            $registro->codigo = $request->codigo;
            $registro->nombre_avion = $request->nombre_avion;
            $registro->id_empresa = $request->id_empresa;
            $registro->capacidad = $request->capacidad;
            $registro->estado_vuelo = $estado_actual;
            $registro->save();
            DB::commit();
            toast('Avión almacenado con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([AvionesController::class, 'getAviones']);
        } catch (\Exception $e) {
            DB::rollback();
            toast('Avión No se pudo insertar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
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
    public function editarRegistro($id)
    {
        return view('theme.pages.mantenimiento.reservaciones.aviones.crearVuelos');
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

    public function editarRegistroAvion($id)
    {
        $data['registro'] = Avion::findOrFail($id);
        $data['listadoEmpresa'] = Empresa::all();
        return view('theme.pages.mantenimiento.reservaciones.aviones.edit', $data);
    }

    public function updateRegistroAvion(Request $request, $id)
    {
        DB::beginTransaction();
        try
        {
            $registro = Avion::findOrFail($id);
            $registro->nombre_avion = $request->nombre_avion;
            $registro->id_empresa = $request->id_empresa;
            $registro->capacidad = $request->capacidad;
            $registro->save();
            DB::commit();
            toast('Avión : '.$registro->nombre_avion.' '. 'Se actualizó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([AvionesController::class, 'getAviones']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('Avión : '.$registro->nombre_avion.' '. 'No se pudo actualizar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
    }

    public function activarAviones(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($registro = Avion::findOrFail($id)) {
                $estado_actual_avion = "En Vuelo";
                $registro->estado_vuelo = $estado_actual_avion;
                $registro->update();
                toast('Estado de : '.$registro->nombre_avion.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function activarAvionesEnEspera(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($registro = Avion::findOrFail($id)) {
                $estado_actual_avion = "En Espera";
                $registro->estado_vuelo = $estado_actual_avion;
                $registro->update();
                toast('Estado de : '.$registro->nombre_avion.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }



}
