<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_asiento');
            $table->string('letra_asiento');
            $table->integer('precio_asiento');
            $table->boolean('disponibilidad');
            $table->string('cabina');
            $table->unsignedInteger('id_reserva');
            $table->unsignedInteger('id_avion');
            $table->timestamps();

            
            
            $table->foreign('id_reserva')
                ->references('id')
                ->on('reservas')
                ->onDelete('cascade');

            
            
            $table->foreign('id_avion')
                ->references('id')
                ->on('aviones')
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
        Schema::dropIfExists('asientos');
    }
}
