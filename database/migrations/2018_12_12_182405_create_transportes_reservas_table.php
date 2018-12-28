<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportesReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportes_reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_transporte');
            $table->unsignedInteger('id_reserva');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();

            
            
            $table->foreign('id_transporte')
                ->references('id')
                ->on('transportes')
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
        Schema::dropIfExists('transportes_reservas');
    }
}
