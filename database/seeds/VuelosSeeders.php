<?php

use Illuminate\Database\Seeder;
use App\Vuelo;

class VuelosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vuelo::class, 30)->create();
    }
}
