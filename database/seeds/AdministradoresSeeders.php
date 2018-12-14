<?php

use Illuminate\Database\Seeder;

class AdministradoresSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Administrador'::class, 10)->create();
    }
}
