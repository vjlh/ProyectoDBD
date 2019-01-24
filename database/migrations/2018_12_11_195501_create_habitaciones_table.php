<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('precio');
            $table->integer('capacidad_habitacion');
            $table->boolean('banio_privado');
            $table->boolean('aire_acondicionado_habitacion');
            $table->boolean('disponibilidad');
            $table->string('tipo');
            $table->unsignedInteger('id_hospedaje');
            $table->timestamps();

            

            $table->foreign('id_hospedaje')
                ->references('id')
                ->on('hospedajes')
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
        Schema::dropIfExists('habitaciones');
    }
}
