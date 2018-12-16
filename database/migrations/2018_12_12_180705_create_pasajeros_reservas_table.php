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
            $table->unsigned('id_reserva');
            $table->unsigned('id_pasajero');
            $table->timestamps();

            
            
            $table->foreing('id_pasajero')
                ->references('id')
                ->on('pasajeros')
                ->onDelete('cascade');

            
            
            $table->foreing('id_reserva')
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
