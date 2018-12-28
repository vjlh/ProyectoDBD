<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_after_user_insert AFTER INSERT ON users FOR EACH ROW
                BEGIN
                    INSERT INTO historiales(descripcion,id_user) VALUES (se creo usuario, NEW.id);
                END
        
        
        ');
        }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER tr_after_user_insert');
    }
}
