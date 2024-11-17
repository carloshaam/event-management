<?php

namespace Database\Factories;

use App\Enums\StageEnum;
use App\Enums\VisibilityEnum;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'visibility' => fake()->randomElement([VisibilityEnum::PRIVATE, VisibilityEnum::PUBLIC]),
            'stage' => fake()->randomElement([StageEnum::DRAFT, StageEnum::PUBLISHED]),
            'title' => fake()->name,
            'slug' => fake()->slug,
            'description' => fake()->text(150),
            'start_time' => fake()->dateTime(),
            'end_time' => fake()->dateTime(now()->addDays(3)),
            'category_id' => Category::factory(),
            'created_by' => fake()->name,
        ];
    }
}
