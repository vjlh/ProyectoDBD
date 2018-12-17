<?php

use Illuminate\Database\Seeder;
use App\Pais;

class PaisesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pais::class, 50)->create();
    }
}
