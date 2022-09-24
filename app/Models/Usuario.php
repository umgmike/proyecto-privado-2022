<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    protected $fillable = ['nombre', 'apellido', 'telefono', 'usuario', 'password', 'estado', 'id_genero', 'id_rol'];
    protected $hidden = ['password', 'remember_token'];
    protected $guarded = ['id'];

}