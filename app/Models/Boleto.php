<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    protected $table = 'boleto';
    protected $fillable = ['id_pasajero', 'ticket', 'id_clase', 'cantidad', 'precio'];
    protected $guarded = ['id'];
}
