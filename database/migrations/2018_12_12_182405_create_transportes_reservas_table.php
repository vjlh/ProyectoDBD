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
            $table->unsigned('id_transporte');
            $table->unsigned('id_reserva');
            $table->timestamps();

            
            
            $table->foreing('id_transporte')
                ->references('id')
                ->on('transportes')
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
        Schema::dropIfExists('transportes_reservas');
    }
}
