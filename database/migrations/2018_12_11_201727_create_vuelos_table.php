<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora_vuelo');
            $table->time('duracion_vuelo');
            $table->date('fecha_vuelo');
            $table->string('origen_vuelo');
            $table->string('destino_vuelo');
            $table->unsignedInteger('id_avion');
            $table->unsignedInteger('id_aeropuerto');
            $table->timestamps();

            

            $table->foreign('id_avion')
                ->references('id')
                ->on('aviones')
                ->onDelete('cascade');
            
            

            $table->foreign('id_aeropuerto')
                ->references('id')
                ->on('aeropuertos')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuelos');
    }
}
