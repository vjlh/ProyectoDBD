<?php

use Illuminate\Database\Seeder;
use App\Hospedaje;

class HospedajesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hospedaje::class, 200)->create();
    }
}
