<?php

namespace Database\Factories;

use App\Models\Response;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Response>
 */
class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'poll_id' => fake()->numberBetween(1, 10),
            'option_id' => fake()->numberBetween(1, 10),
        ];
    }
}
