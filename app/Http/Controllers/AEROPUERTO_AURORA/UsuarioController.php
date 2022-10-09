<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidate;
use App\Http\Requests\PassValidate;
use Illuminate\Support\Facades\Hash;

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
        $genero = Genero::all();
        return view('theme.pages.mantenimiento.usuarios.create', compact('roles', 'genero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function grabarRegistro(UserValidate $request)
    {

        DB::beginTransaction();
        try
        {
            $request->request->add([
                'password' => Hash::make($request->input('password'))
            ]);

            $registro = new Usuario();
            $registro->id_rol = $request->id_rol;
            $registro->nombre = $request->nombre;
            $registro->apellido = $request->apellido;
            $registro->id_genero = $request->id_genero;
            $registro->telefono = $request->telefono;
            $registro->usuario = $request->usuario;
            $registro->password = $request->password;
            $registro->save();
            DB::commit();
            toast('Usuario : '.$registro->usuario.' '. ' Se actualizó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([UsuarioController::class, 'getUsuarios']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('Usuario : '.$registro->usuario.' '. 'No se pudo actualizar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
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
        $data['registro'] = Usuario::findOrFail($id);
        $data['listadoRoles'] = Rol::all();
        $data['listadoGenero'] = Genero::all();
        return view('theme.pages.mantenimiento.usuarios.update', $data);
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
            $registro = Usuario::findOrFail($id);
            $registro->id_rol = $request->id_rol;
            $registro->nombre = $request->nombre;
            $registro->apellido = $request->apellido;
            $registro->id_genero = $request->id_genero;
            $registro->telefono = $request->telefono;
            $registro->usuario = $request->usuario;
            $registro->save();
            DB::commit();
            toast('El usuario de : '.$registro->nombre.' '.$registro->apellido.' '. 'Se actualizó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([UsuarioController::class, 'getUsuarios']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('El usuario de : '.$registro->nombre.' '.$registro->apellido.' '. 'No se pudo actualizar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
    }

    public function updatePass(PassValidate $request, $id)
    {
        DB::beginTransaction();
        try
        {
            $request->request->add([
                'password' => Hash::make($request->input('password'))
            ]);

            $registro = Usuario::findOrFail($id);
            $registro->password = $request->password;
            $registro->save();
            DB::commit();
            toast('Contraseña del suario : '.$registro->nombre.' '.$registro->apellido.' '. 'Se actualizó con éxito','info')->timerProgressBar()->autoClose(4500);
            return redirect()->action([UsuarioController::class, 'getUsuarios']);
        } catch (\Exception $e) {
          DB::rollback();
          toast('Contraseña del suario : '.$registro->nombre.' '.$registro->apellido.' '. 'No se pudo actualizar' . $e . ' ','error')->timerProgressBar()->autoClose(4500);
        }
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
