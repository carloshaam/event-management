<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'title' => fake()->realText(45),
            'quantity' => fake()->randomNumber(3),
            'price' => fake()->randomNumber(2),
            'quantity_per_order' => fake()->randomNumber(3),
            'start_time' => fake()->dateTime(),
            'end_time' => fake()->dateTime(now()->addDays(3)),
        ];
    }
}
