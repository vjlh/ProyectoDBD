<?php

use Illuminate\Database\Seeder;

class TransportesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Transporte'::class, 20)->create();
    }
}
