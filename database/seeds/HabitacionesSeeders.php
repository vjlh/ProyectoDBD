<?php

use Illuminate\Database\Seeder;

class HabitacionesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App/Habitacion'::class, 30)->create();
    }
}
