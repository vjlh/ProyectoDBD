<?php

use Illuminate\Database\Seeder;
use App\Administrador;

class AdministradoresSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Administrador::class, 10)->create();
    }
}
