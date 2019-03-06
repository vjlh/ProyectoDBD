<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsientosVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asientos_vuelos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_vuelo');
            $table->unsignedInteger('id_asiento');
            $table->unsignedInteger('id_reserva');
            $table->string('codigo_checkin');
            $table->boolean('check_in');
            $table->boolean('disponible');
            $table->timestamps();

            $table->foreign('id_vuelo')
                ->references('id')
                ->on('vuelos')
                ->onDelete('cascade');

            $table->foreign('id_asiento')
                ->references('id')
                ->on('asientos')
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
        Schema::dropIfExists('asientos_vuelos');
    }
}
