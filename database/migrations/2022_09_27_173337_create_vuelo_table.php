<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_pasajeros');
            $table->string('empresa');
            $table->string('descripcion');
            $table->unsignedInteger('id_boleto');
            $table->foreign('id_boleto','fk_vuelo_boleto')->references('id')->on('boleto');
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
        Schema::dropIfExists('vuelo');
    }
}
