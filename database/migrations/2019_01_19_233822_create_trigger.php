<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Trigger para asignar la hora del pago 
        DB::statement('
        CREATE OR REPLACE FUNCTION agregarHoraPago() RETURNS trigger AS
        $$
            BEGIN
            NEW.fecha_pago = now();
            RETURN NEW;
            END
        $$ LANGUAGE plpgsql;
                ');
        
        //Trigger para que al momento de crear usuario se le asocie un historial
        DB::statement('
        CREATE OR REPLACE FUNCTION crearHistorial() RETURNS trigger AS
        $$
        BEGIN
            INSERT INTO historiales (id,descripcion,id_user,created_at,updated_at) 
            VALUES (DEFAULT,\'CREACION DE USUARIO\',NEW.id,now(),now());
            RETURN NEW;
        END
        $$ LANGUAGE plpgsql;
        ');
        
        //Trigger para aplicar descuento según promocion
        

        DB::unprepared('
        CREATE TRIGGER crearTicket BEFORE INSERT ON tickets FOR EACH ROW EXECUTE PROCEDURE agregarHoraPago();
        CREATE TRIGGER crearHistorial AFTER INSERT ON users FOR EACH ROW EXECUTE PROCEDURE crearHistorial();
        

        ');
        //Trigger para que al momento de crear usuario se le asocie un historial
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger');
    }
}
