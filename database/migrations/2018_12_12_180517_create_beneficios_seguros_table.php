<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiosSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficios_seguros', function (Blueprint $table) {
            $table->increments('id');
            $table->unsigned('id_beneficio');
            $table->unsigned('id_seguro');
            $table->timestamps();

            
            $table->foreing('id_beneficio')
                ->references('id')
                ->on('beneficios')
                ->onDelete('cascade');

            
            
            $table->foreing('id_seguro')
                ->references('id')
                ->on('seguros')
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
        Schema::dropIfExists('beneficios_seguros');
    }
}
