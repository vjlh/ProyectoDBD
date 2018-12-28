<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMontoReservaTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement('
        CREATE OR REPLACE FUNCTION AplicarDescuento()
        RETURNS trigger AS
        $$
        BEGIN           
            UPDATE reservas
            SET monto_total_reserva = monto_total_reserva-NEW.descuento_promocion
            WHERE monto_total_reservas.id = NEW.id;
            RETURN NEW;
        END
        $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
        CREATE TRIGGER tr_updMontoReserva AFTER INSERT ON promociones FOR EACH ROW
        EXECUTE PROCEDURE AplicarDescuento();
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_monto_reserva_trigger');
    }
}
