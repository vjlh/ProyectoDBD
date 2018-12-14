<?php

use Illuminate\Database\Seeder;

class PasajerosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Pasajero'::class, 30)->create();
    }
}
