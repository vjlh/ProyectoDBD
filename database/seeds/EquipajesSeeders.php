<?php

use Illuminate\Database\Seeder;
use App\Equipaje;

class EquipajesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Equipaje::class, 20)->create();
    }
}
