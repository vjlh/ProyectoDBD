<?php

use Illuminate\Database\Seeder;
use App\Promocion;

class PromocionesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Promocion::class, 20)->create();
    }
}
