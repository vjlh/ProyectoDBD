<?php

use Illuminate\Database\Seeder;

class HistorialesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Historial'::class, 20)->create();
    }
}
