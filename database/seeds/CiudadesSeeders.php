<?php

use Illuminate\Database\Seeder;

class CiudadesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Ciudad'::class, 40)->create();
    }
}
