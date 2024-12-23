<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Location;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory()
             ->has(Location::factory())
             ->has(Ticket::factory())
             ->create();
    }
}
