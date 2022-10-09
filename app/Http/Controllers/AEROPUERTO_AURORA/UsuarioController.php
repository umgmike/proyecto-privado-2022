<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Genero;

use DB;
use Alert;

class UsuarioController extends Controller
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
    public function getUsuarios()
    {
        $sql = '
                SELECT
                    u.id,
                    CONCAT(u.nombre, " ", u.apellido) AS nombre_completo,
                    u.telefono,
                    u.usuario,
                    r.rol,
                    u.estado,
                    g.genero,
                    u.estado
                FROM usuario u
                INNER JOIN genero g ON (u.id_genero = g.id)
                INNER JOIN rol r ON (u.id_rol = r.id)
                ORDER BY u.id ASC';
        $usuarios = DB::select($sql);

        return view('theme.pages.mantenimiento.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearUsuarios()
    {
        $roles = Rol::all();
        return view('theme.pages.mantenimiento.usuarios.create', compact('roles'));
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
    public function desactivarUsuarios(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($usuarios = Usuario::findOrFail($id)) {
                $usuarios->estado = $usuarios->estado ? '0' : '1';
                $usuarios->update();
                toast('Estado de : '.$usuarios->nombre.' '. 'cambiada con éxito','info')->timerProgressBar()->autoClose(4800);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
