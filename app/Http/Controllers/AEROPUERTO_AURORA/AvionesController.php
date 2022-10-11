<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Avion;
use App\Models\Empresa;
use App\Models\Pasajero;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Clase;
use App\Models\Boleto;

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

        $datos = DB::table('boleto AS b')
            ->select(
                DB::raw('COUNT(b.id_avion)'),
                )
            ->groupBy('b.id_avion')
            ->get();

        return view('theme.pages.mantenimiento.reservaciones.aviones.index', compact('aviones', 'datos'));
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
        $data['registro'] = Avion::findOrFail($id);
        $data['listadoAviones'] = Avion::all();
        $data['listadoPasajero'] = Pasajero::all();
        $data['listadoClase'] = Clase::all();
        $data['listadoPais'] = Pais::all();
        $sql = '
            SELECT
                p.id,
                p.pais
            FROM pais p
            WHERE p.id = 8';
        $pais_destino = DB::select($sql);

        $data['listadoDepartamento'] = Departamento::all();
        return view('theme.pages.mantenimiento.reservaciones.aviones.crearVuelos', $data, compact('pais_destino'));
    }





    public function grabarRegistroAviones(Request $request)
    {
        DB::beginTransaction();
        try
            {
                $registro = new Boleto();
                $registro->id_avion =  $request->id_avion;
                $registro->id_pasajero = $request->id_pasajero;
                $registro->id_clase = $request->id_clase;
                $registro->precio = $request->precio;
                $registro->cantidad = $request->cantidad;
                $registro->total = $request->total;
                $registro->id_pais_origen = $request->id_pais_origen;
                $registro->id_pais_destino = $request->id_pais_destino;
                $registro->id_ciudad_destino = $request->id_ciudad_destino;
                $registro->direccion = $request->direccion;
                $registro->motivo = $request->motivo;
                $registro->fecha_inicio = $request->fecha_inicio;
                $registro->fecha_fin = $request->fecha_fin;
                $registro->save();
                DB::commit();
                toast('Aviones almacenado con éxito','info')->timerProgressBar()->autoClose(4500);
                return redirect()->action([AvionesController::class, 'getAviones']);
            } catch (\Exception $e) {
                DB::rollback();
                toast('Aviones No se pudo insertar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
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
