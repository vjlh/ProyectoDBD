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
            $table->unsignedInteger('id_habitacion');
            $table->unsignedInteger('id_reserva');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();

            
            
            $table->foreign('id_habitacion')
                ->references('id')
                ->on('habitaciones')
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
        Schema::dropIfExists('habitaciones_reservas');
    }
}
