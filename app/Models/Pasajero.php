<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $table = 'pasajero';
    protected $fillable = ['nombre', 'apellido', 'telefono', 'dpi', 'edad', 'id_genero'];
    protected $guarded = ['id'];
}
