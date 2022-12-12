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
        Schema::create('det_compras', function (Blueprint $table) {
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('compra_id');
            $table->primary(['producto_id','compra_id']);
            $table->integer('cantidad');
            $table->integer('precio_unitario');
            $table->integer('subtotal');
            $table->integer('total');
            $table->string('medio_pago');
            $table->softdeletes();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('compra_id')->references('id')->on('compras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('det_compra');
    }
};
