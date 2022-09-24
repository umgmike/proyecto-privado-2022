<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('usuario')->unique();
            $table->string('password');
            $table->boolean('estado')->default(1);
            $table->unsignedInteger('id_genero');
            $table->foreign('id_genero','fk_genero_usuario')->references('id')->on('genero');
            $table->unsignedInteger('id_rol');
            $table->foreign('id_rol','fk_rol_usuario')->references('id')->on('rol');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
