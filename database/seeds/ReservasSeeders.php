<?php

use Illuminate\Database\Seeder;
use App\Reserva;

class ReservasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reserva::class, 25)->create();
    }
}
