<?php

use Illuminate\Database\Seeder;
use App\Transporte;

class TransportesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transporte::class, 100)->create();
    }
}
