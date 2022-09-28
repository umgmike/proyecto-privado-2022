<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'pais';
    protected $fillable = ['id_depto', 'pais'];
    protected $guarded = ['id'];
}
