<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_vuelo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pais_origen');
            $table->foreign('id_pais_origen','fk_detalle_vuelo_pais_origen')->references('id')->on('pais');
            $table->unsignedInteger('id_pais_destino');
            $table->foreign('id_pais_destino','fk_detalle_vuelo_pais_destino')->references('id')->on('pais');
            $table->unsignedInteger('id_ciudad_destino');
            $table->foreign('id_ciudad_destino','fk_detalle_vuelo_ciudad_destino')->references('id')->on('departamento');
            $table->unsignedInteger('id_clase');
            $table->foreign('id_clase','fk_detalle_vuelo_clase')->references('id')->on('clase');
            $table->unsignedInteger('id_vuelo');
            $table->foreign('id_vuelo','fk_detalle_vuelo_vuelo')->references('id')->on('vuelo');
            $table->unsignedInteger('id_aereopuerto');
            $table->foreign('id_aereopuerto','fk_detalle_vuelo_aereopuerto')->references('id')->on('aereopuerto');
            $table->integer('dias_pais_destino');
            $table->date('hora_inicio');
            $table->date('hora_fin');
            $table->string('asiento');
            $table->text('motivo_vuelo');
            $table->unsignedInteger('id_avion');
            $table->foreign('id_avion','fk_detalle_vuelo_avion')->references('id')->on('avion');
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
        Schema::dropIfExists('detalle_vuelo');
    }
}
