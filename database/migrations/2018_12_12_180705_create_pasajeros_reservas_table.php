<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasajerosReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajeros_reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_reserva');
            $table->unsignedInteger('id_pasajero');
            $table->timestamps();

            
            
            $table->foreign('id_pasajero')
                ->references('id')
                ->on('pasajeros')
                ->onDelete('cascade');

            
            
            $table->foreign('id_reserva')
                ->references('id')
                ->on('reservas')
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
        Schema::dropIfExists('pasajeros_reservas');
    }
}
