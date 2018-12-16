<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionesReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones_reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsigned('id_habitacion');
            $table->unsigned('id_reserva');
            $table->timestamps();

            
            
            $table->foreing('id_habitacion')
                ->references('id')
                ->on('habitaciones')
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
        Schema::dropIfExists('habitaciones_reservas');
    }
}
