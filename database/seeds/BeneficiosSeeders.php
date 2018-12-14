<?php

use Illuminate\Database\Seeder;

class BeneficiosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Beneficio'::class, 10)->create();
    }
}
