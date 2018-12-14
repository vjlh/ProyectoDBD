<?php

use Illuminate\Database\Seeder;

class VuelosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Vuelo'::class, 30)->create();
    }
}
