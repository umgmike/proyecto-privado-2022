<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rol;

use DB;
use Alert;


class RolController extends Controller
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
    public function getRoles()
    {
        $sql = '
            SELECT
                id,
                rol,
                estado,
                created_at,
                updated_at
            FROM rol';
        $roles = DB::select($sql);
        return view('theme.pages.mantenimiento.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearRoles()
    {
        return view('theme.pages.mantenimiento.roles.create');
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
            $registro = new Rol();
            $registro->rol = $request->rol;
            $registro->save();
            DB::commit();
            toast('Registro almacenado con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([RolController::class, 'getRoles']);
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
        $data['registro'] = Rol::findOrFail($id);
        return view('theme.pages.mantenimiento.roles.edit', $data);
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
            $registro = Rol::findOrFail($id);
            $registro->rol = $request->rol;
            $registro->save();
            DB::commit();
            toast('Rol: '.$registro->rol.' '. ' Se actualizó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([RolController::class, 'getRoles']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('ROl : '.$registro->rol.' '. 'No se pudo actualizar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
    }

    public function desactivarRol(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($roles = Rol::findOrFail($id)) {
                $roles->estado = $roles->estado ? '0' : '1';
                $roles->update();
                toast('Estado de : '.$roles->rol.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
