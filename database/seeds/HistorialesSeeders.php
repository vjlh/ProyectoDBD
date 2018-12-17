<?php

use Illuminate\Database\Seeder;
use App\Historial;

class HistorialesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Historial::class, 20)->create();
    }
}
