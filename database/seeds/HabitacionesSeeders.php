<?php

use Illuminate\Database\Seeder;
use App\Habitacion;

class HabitacionesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Habitacion::class, 150)->create();
    }
}
