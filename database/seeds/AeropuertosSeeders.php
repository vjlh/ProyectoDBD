<?php

use Illuminate\Database\Seeder;
use App\Aeropuerto;

class AeropuertosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Aeropuerto::class, 30)->create();
    }
}
