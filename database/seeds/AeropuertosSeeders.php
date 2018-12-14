<?php

use Illuminate\Database\Seeder;

class AeropuertosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Aeropuerto'::class, 30)->create();
    }
}
