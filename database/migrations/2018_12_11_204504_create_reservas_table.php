<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monto_total_reserva');
            $table->boolean('check_in')->nullable();
            $table->unsignedInteger('id_paquete')->nullable();
            $table->unsignedInteger('id_promocion')->nullable();
            $table->unsignedInteger('id_seguro')->nullable();
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_asiento');
            $table->boolean('transporte');
            $table->boolean('hospedaje');
            $table->boolean('vuelo');

            $table->timestamps();

            
            
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            
            
            $table->foreign('id_seguro')
                ->references('id')
                ->on('seguros')
                ->onDelete('cascade');

            
            
            $table->foreign('id_promocion')
                ->references('id')
                ->on('promociones')
                ->onDelete('cascade');

            
            
            $table->foreign('id_paquete')
                ->references('id')
                ->on('paquetes')
                ->onDelete('cascade');


            $table->foreign('id_asiento')
            ->references('id')
            ->on('asientos')
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
        Schema::dropIfExists('reservas');
    }
}
