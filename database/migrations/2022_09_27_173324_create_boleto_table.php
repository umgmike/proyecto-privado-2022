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
            $table->unsignedInteger('id_pasajero');
            $table->foreign('id_pasajero','fk_boleto_pasajero')->references('id')->on('pasajero');
            $table->string('ticket')->unique()->nullable();
            $table->unsignedInteger('id_clase');
            $table->foreign('id_clase','fk_boleto_clase')->references('id')->on('clase');
            $table->integer('cantidad');
            $table->decimal('precio', 18,2);
            $table->decimal('total', 18,2);
            $table->boolean('estado')->default(1);
            $table->text('motivo');
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
