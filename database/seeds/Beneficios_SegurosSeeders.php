<?php

use Illuminate\Database\Seeder;
use App\Beneficio_Seguro;

class Beneficios_SegurosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Beneficio_Seguro::class, 50)->create();
    }
}
