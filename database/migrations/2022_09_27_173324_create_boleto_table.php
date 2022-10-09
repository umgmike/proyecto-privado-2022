<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_avion');
            $table->foreign('id_avion','fk_boleto_avion')->references('id')->on('avion');
            $table->unsignedInteger('id_pasajero');
            $table->foreign('id_pasajero','fk_boleto_pasajero')->references('id')->on('pasajero');
            $table->unsignedInteger('id_clase');
            $table->foreign('id_clase','fk_boleto_clase')->references('id')->on('clase');
            $table->integer('cantidad');
            $table->decimal('precio', 18,2);
            $table->decimal('total', 18,2);
            $table->boolean('estado')->default(1);
            $table->text('motivo');
            $table->unsignedInteger('id_pais_origen');
            $table->foreign('id_pais_origen','fk_boleto_pais_origen')->references('id')->on('pais');
            $table->unsignedInteger('id_pais_destino');
            $table->foreign('id_pais_destino','fk_boleto_pais_destino')->references('id')->on('pais');
            $table->unsignedInteger('id_ciudad_destino');
            $table->foreign('id_ciudad_destino','fk_boleto_ciudad_destino')->references('id')->on('departamento');
            $table->text('direccion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::dropIfExists('boleto');
    }
}
