<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_categoria');
            $table->foreign('id_categoria','fk_avion_categoria')->references('id')->on('categoria');
            $table->string('codigo')->unique();
            $table->string('nombre_avion');
            $table->unsignedInteger('id_empresa');
            $table->foreign('id_empresa','fk_avion_empresa')->references('id')->on('empresa');
            $table->integer('capacidad');
            $table->string('estado_vuelo');
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
        Schema::dropIfExists('avion');
    }
}
