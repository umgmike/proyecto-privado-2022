<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Vuelo extends Model
{
    protected $table = 'detalle_vuelo';
    protected $fillable = ['id_pais_origen', 'id_pais_destino', 'id_ciudad_destino', 'id_clase', 'id_vuelo', 'id_aereopuerto', 'dias_pais_destino', 'hora_inicio', 'hora_fin', 'asiento', 'motivo_vuelo', 'id_avion'];
    protected $guarded = ['id'];

}
