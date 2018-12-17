<?php

use Illuminate\Database\Seeder;
use App\Paquete;

class PaquetesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Paquete::class, 20)->create();
    }
}
