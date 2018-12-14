<?php

use Illuminate\Database\Seeder;

class SegurosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Seguro'::class, 10)->create();
    }
}
