<?php

use Illuminate\Database\Seeder;
use App\Asiento;

class AsientosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Asiento::class, 50)->create();
    }
}
