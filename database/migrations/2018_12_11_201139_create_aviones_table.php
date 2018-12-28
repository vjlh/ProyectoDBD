<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aviones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_disponible');
            $table->integer('capacidad_avion');
            $table->integer('salidas_emergencia');
            $table->integer('sanitarios_avion');
            $table->integer('longitud_avion');
            $table->string('envergadura_avion');
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
        Schema::dropIfExists('aviones');
    }
}
