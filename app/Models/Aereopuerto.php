<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aereopuerto extends Model
{
    protected $table = 'aereopuerto';
    protected $fillable = ['nombre', 'direccion'];
    protected $guarded = ['id'];
}
