<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    protected $table = 'boleto';
    protected $fillable = ['id_pasajero', 'ticket', 'id_clase', 'cantidad', 'precio', 'total', 'estado', 'motivo', 'id_pais_origen', 'id_pais_destino', 'id_ciudad_destino', 'direccion'];
    protected $guarded = ['id'];
}
