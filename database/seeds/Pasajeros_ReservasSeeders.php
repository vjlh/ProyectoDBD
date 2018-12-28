<?php

use Illuminate\Database\Seeder;
use App\Pasajero_Reserva;

class Pasajeros_ReservasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Pasajero_Reserva::class, 50)->create();
    }
}
