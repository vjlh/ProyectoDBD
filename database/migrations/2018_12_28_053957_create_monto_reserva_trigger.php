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

        DB::unprepared('
        CREATE TRIGGER tr_updMontoReserva AFTER INSERT ON reservas FOR EACH ROW
        BEGIN
            FROM promociones         
            SET NEW.monto_total_reserva = NEW.monto_total_reserva*(100-promociones.descuento_promocion)
            WHERE NEW.id_promocion = promociones.id;
        END
        $$ LANGUAGE plpgsql;

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
