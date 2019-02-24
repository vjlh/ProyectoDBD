<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_dias');
            $table->integer('num_noches');
            $table->date('fecha_paquete');
            $table->integer('precio_paquete');
            $table->string('destino_paquete');
            $table->string('tipo_paquete');
            $table->unsignedInteger('id_vuelo_ida');
            $table->unsignedInteger('id_vuelo_vuelta');
            $table->unsignedInteger('id_transporte')->nullable();
            $table->unsignedInteger('id_hospedaje')->nullable();
            $table->unsignedInteger('id_habitacion')->nullable();
            $table->timestamps();

            $table->foreign('id_vuelo_ida')
                ->references('id')
                ->on('vuelos')
                ->onDelete('cascade');

            $table->foreign('id_vuelo_vuelta')
                ->references('id')
                ->on('vuelos')
                ->onDelete('cascade');

            $table->foreign('id_transporte')
                ->references('id')
                ->on('transportes')
                ->onDelete('cascade');

            $table->foreign('id_hospedaje')
                ->references('id')
                ->on('hospedajes')
                ->onDelete('cascade');

            $table->foreign('id_habitacion')
                ->references('id')
                ->on('habitaciones')
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
        Schema::dropIfExists('paquetes');
    }
}
