<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospedajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ubicacion');
            $table->string('nombre_hospedaje');
            $table->string('cadena_hospedaje');
            $table->integer('cantidad_disponible');
            $table->integer('estrellas_hospedaje');
            $table->boolean('estacionamiento_hospedaje');
            $table->boolean('piscina_hospedaje');
            $table->boolean('sauna_hospedaje');
            $table->boolean('zona_infantil_hospedaje');
            $table->boolean('gimnasio_hospedaje');
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
        Schema::dropIfExists('hospedajes');
    }
}
