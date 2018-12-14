<?php

use Illuminate\Database\Seeder;

class ReservasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Reserva'::class, 25)->create();
    }
}
