<?php

use Illuminate\Database\Seeder;
use App\Ciudad;

class CiudadesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ciudad::class, 50)->create();
    }
}
