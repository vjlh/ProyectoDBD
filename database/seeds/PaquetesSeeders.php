<?php

use Illuminate\Database\Seeder;

class PaquetesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Paquete'::class, 20)->create();
    }
}
