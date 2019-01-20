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
        DB::statement('
        CREATE OR REPLACE FUNCTION aplicarDescuento() RETURNS trigger AS
        $$
        DECLARE
            descuento real;
            precio_final real;
        BEGIN
            SELECT promociones.descuento_promocion INTO descuento
            FROM promociones
            WHERE NEW.id_promocion = promociones.id
            LIMIT 1;

            precio_final = NEW.monto_total_reserva*(1.0-(descuento/100.0));
            NEW.monto_total_reserva := precio_final;

            RETURN NEW;
        END
        $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
        CREATE TRIGGER crearTicket BEFORE INSERT ON tickets FOR EACH ROW EXECUTE PROCEDURE agregarHoraPago();
        CREATE TRIGGER crearHistorial AFTER INSERT ON users FOR EACH ROW EXECUTE PROCEDURE crearHistorial();
        CREATE TRIGGER aplicarDescuento BEFORE INSERT ON reservas FOR EACH ROW EXECUTE PROCEDURE aplicarDescuento();

        ');

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
