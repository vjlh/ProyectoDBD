<?php

use Illuminate\Database\Seeder;

class EquipajesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Equipaje'::class, 20)->create();
    }
}
