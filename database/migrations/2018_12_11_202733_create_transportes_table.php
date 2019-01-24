<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('precio');
            $table->integer('patente_transporte');
            $table->boolean('disponibilidad');
            $table->string('modelo_transporte');
            $table->integer('num_asientos_transporte');
            $table->integer('num_puertas_transporte');
            $table->boolean('aire_acondicionado_transporte');
            $table->integer('puntuacion_transporte');
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
        Schema::dropIfExists('transportes');
    }
}
