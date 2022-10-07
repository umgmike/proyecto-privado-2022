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

class BoletoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBoleto()
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

        $boletos = DB::select($sql);

        return view('theme.pages.mantenimiento.reservaciones.boletos.index', compact('boletos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearBoleto()
    {
        $clase = Clase::all();
        $pasajero = Pasajero::all();
        $rel_ticket = Boleto::all();
        return view('theme.pages.mantenimiento.reservaciones.boletos.generarBoleto', compact('clase', 'pasajero', 'rel_ticket'));
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
            $registro = new Boleto();
            $registro->id_pasajero = $request->id_pasajero;
            $registro->id_clase = $request->id_clase;
            $registro->ticket = $request->ticket;
            $registro->cantidad = $request->cantidad;
            $registro->precio = $request->precio;
            $registro->total = $request->total;
            $registro->motivo = $request->motivo;
            $registro->save();
            DB::commit();
            toast('Boleto almacenado con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([BoletoController::class, 'getBoleto']);
        } catch (\Exception $e) {
            DB::rollback();
            toast('Boleto No se pudo insertar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
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
        $data['registro'] = Boleto::findOrFail($id);
        $data['pasajero'] = Pasajero::all();
        $data['clase'] = Clase::all();
        return view('theme.pages.mantenimiento.reservaciones.boletos.edit', $data);
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
            $registro = Boleto::findOrFail($id);
            $registro->id_pasajero = $request->id_pasajero;
            $registro->id_clase = $request->id_clase;
            $registro->cantidad = $request->cantidad;
            $registro->precio = $request->precio;
            $registro->total = $request->total;
            $registro->motivo = $request->motivo;
            $registro->save();
            DB::commit();
            toast('El boleto : '.$registro->ticket.' '. 'Se actualizó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([BoletoController::class, 'getBoleto']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('El boleto : '.$registro->ticket.' '. 'No se pudo actualizar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivarBoleto(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($registro = Boleto::findOrFail($id)) {
                $registro->estado = $registro->estado ? '0' : '1';
                $registro->update();
                toast('Estado de : '.$registro->nombre.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
