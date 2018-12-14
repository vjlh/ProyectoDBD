<?php

use Illuminate\Database\Seeder;

class RestriccionesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Restriccion'::class, 20)->create();
    }
}
