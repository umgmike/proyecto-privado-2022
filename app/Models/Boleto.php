<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    protected $table = 'boleto';
    protected $fillable = ['id_pasajero', 'ticket', 'fecha_registro'];
    protected $guarded = ['id'];
}
