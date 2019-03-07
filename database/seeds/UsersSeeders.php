<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 15)->create();
    }
}
