<?php

use Illuminate\Database\Seeder;
use App\Asiento_Vuelo;

class Asientos_VuelosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Asiento_Vuelo::class, 1000)->create();
    }
}
