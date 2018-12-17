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
            $table->boolean('check_in');
            $table->unsigned('id_paquete');
            $table->unsigned('id_promocion');
            $table->unsigned('id_seguro');
            $table->unsigned('id_user');
            $table->timestamps();

            
            
            $table->foreing('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            
            
            $table->foreing('id_seguro')
                ->references('id')
                ->on('seguros')
                ->onDelete('cascade');

            
            
            $table->foreing('id_promocion')
                ->references('id')
                ->on('promociones')
                ->onDelete('cascade');

            
            
            $table->foreing('id_paquete')
                ->references('id')
                ->on('paquetes')
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
