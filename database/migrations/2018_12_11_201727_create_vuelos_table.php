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
            $table->unsigned('id_avion');
            $table->unsigned('id_aeropuerto');
            $table->timestamps();

            

            $table->foreing('id_avion')
                ->references('id')
                ->on('aviones')
                ->onDelete('cascade');
            
            

            $table->foreing('id_aeropuerto')
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
