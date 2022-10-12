<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inventario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_categoria');
            $table->foreign('id_categoria','fk_inventario_categoria')->references('id')->on('categoria_inventario');
            $table->unsignedInteger('id_inventario');
            $table->foreign('id_inventario','fk_inventario_inventario')->references('id')->on('inventario');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario','fk_usuario_detalle_inventario')->references('id')->on('usuario');
            $table->decimal('precio',18,2);
            $table->decimal('subtotal',18,2);
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
        Schema::dropIfExists('detalle_inventario');
    }
}
