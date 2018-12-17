<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAeropuertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeropuertos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_aeropuerto');
            $table->string('direccion_aeropuerto');
            $table->string('telefono_aeropuerto');
            $table->string('pagina_web');
            $table->unsignedInteger('id_ciudad');
            $table->timestamps();


            $table->foreign('id_ciudad')
                ->references('id')
                ->on('ciudades')
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
        Schema::dropIfExists('aeropuertos');
    }
}
