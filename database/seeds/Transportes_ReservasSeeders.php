<?php

use Illuminate\Database\Seeder;
use App\Transporte_Reserva;

class Transportes_ReservasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Transporte_Reserva::class,50)->create();
    }
}
