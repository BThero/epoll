<?php

namespace Database\Factories;

use App\Models\Poll;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Poll>
 */
class PollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->boolean(20) ? implode(fake()->sentences(3)) : null,
            'question' => fake()->sentence(),
            'user_id' => fake()->numberBetween(1, 10),
        ];
    }
}
