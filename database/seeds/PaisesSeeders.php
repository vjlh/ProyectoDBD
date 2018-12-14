<?php

use Illuminate\Database\Seeder;

class PaisesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Pais'::class, 50)->create();
    }
}
