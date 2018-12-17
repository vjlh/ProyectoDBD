<?php

use Illuminate\Database\Seeder;
use App\Avion;

class AvionesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Avion::class, 30)->create();
    }
}
