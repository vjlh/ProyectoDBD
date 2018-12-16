<?php

use Illuminate\Database\Seeder;
use App\Seguro;

class SegurosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Seguro::class, 10)->create();
    }
}
