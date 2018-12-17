<?php

use Illuminate\Database\Seeder;
use App\Restriccion;

class RestriccionesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Restriccion::class, 20)->create();
    }
}
