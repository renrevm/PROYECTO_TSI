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
        Schema::create('arqueos_caja', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->date('inicio');
            $table->date('termino');
            $table->integer('inicio_caja');
            $table->integer('cierre_caja');
                        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arqueos_caja');
    }
};
