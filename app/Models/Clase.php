<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clase';
    protected $fillable = ['clase'];
    protected $guarded = ['id'];
}
