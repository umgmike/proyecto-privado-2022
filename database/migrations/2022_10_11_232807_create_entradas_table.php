<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_aereopuerto');
            $table->foreign('id_aereopuerto','fk_aerolinea_aereopuerto')->references('id')->on('aereopuerto');
            $table->unsignedInteger('id_avion');
            $table->foreign('id_avion','fk_aerolinea_avion')->references('id')->on('avion');
            $table->integer('cantidad_entradas');
            $table->date('fecha_entrada');
            $table->unsignedInteger('id_usuario_registra');
            $table->foreign('id_usuario_registra','fk_usuario_avion')->references('id')->on('usuario');
            $table->unsignedInteger('id_aerolinea_registra');
            $table->foreign('id_aerolinea_registra','fk_aerolinea_avion')->references('id')->on('aerolinea');
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
        Schema::dropIfExists('entradas');
    }
}
