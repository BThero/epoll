<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Poll;
use App\Models\Response;
use App\Models\User;
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
            'user_id' => User::factory(),
            'poll_id' => Poll::factory(),
            'option_id' => Option::factory(),
        ];
    }
}
