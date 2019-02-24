<?php

use Illuminate\Database\Seeder;
use App\Habitacion_Reserva;

class Habitaciones_ReservasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Habitacion_Reserva::class, 100)->create();
    }
}
