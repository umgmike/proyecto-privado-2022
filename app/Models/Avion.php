<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    protected $table = 'avion';
    protected $fillable = ['codigo', 'nombre_avion', 'empresa', 'capacidad', 'esstado_vuelo'];
    protected $guarded = ['id'];
}
