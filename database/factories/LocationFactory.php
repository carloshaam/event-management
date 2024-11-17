<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'place_name' => fake()->name,
            'zip_code' => Str::numbers(fake()->postcode()),
            'street' => fake()->streetName(),
            'number' => fake()->numberBetween(1, 1000),
            'complement' => null,
            'neighborhood' => fake()->streetName(),
            'city' => fake()->city(),
            'state' => fake()->countryCode(),
        ];
    }
}
