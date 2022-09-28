<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $table = 'vuelo';
    protected $fillable = ['total_pasajeros', 'empresa', 'descripcion', 'id_boleto', 'estado'];
    protected $guarded = ['id'];
}
