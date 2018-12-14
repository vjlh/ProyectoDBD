<?php

use Illuminate\Database\Seeder;

class AvionesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Avion'::class, 30)->create();
    }
}
