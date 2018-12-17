<?php

use Illuminate\Database\Seeder;
use App\Pasajero;

class PasajerosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pasajero::class, 30)->create();
    }
}
