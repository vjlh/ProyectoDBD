<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class TicketsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ticket::class, 30)->create();
    }
}
