<?php

use Illuminate\Database\Seeder;
use App\Beneficio;

class BeneficiosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Beneficio::class, 10)->create();
    }
}
