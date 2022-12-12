<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_ajuste');
            $table->string('nombre_producto');
            $table->integer('precio_costo');
            $table->integer('precio_venta');
            $table->integer('stock');
    
            $table->softdeletes();
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_ajuste')->references('id')->on('ajustes_stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
};