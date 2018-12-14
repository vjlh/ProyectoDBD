<?php

use Illuminate\Database\Seeder;

class AsientosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Asiento'::class, 50)->create();
    }
}
