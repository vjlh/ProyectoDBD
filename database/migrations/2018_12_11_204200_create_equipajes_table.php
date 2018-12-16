<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ancho');
            $table->integer('alto');
            $table->integer('largo');
            $table->string('tipo_equipaje');
            $table->unsigned('id_pasajero');
            $table->longText('restricion_equipaje');
            $table->timestamps();

            
            
            $table->foreing('id_pasajero')
                ->references('id')
                ->on('pasajeros')
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
        Schema::dropIfExists('equipajes');
    }
}
