<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::factory()->has(Event::factory())->count(1)->create();
    }
}
