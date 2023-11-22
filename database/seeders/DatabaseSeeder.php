<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Option;
use App\Models\Poll;
use App\Models\Response;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $polls = Poll::factory(10)->recycle($users)->create();

        $option_values = collect(['Yes', 'No'])->all();
        foreach ($option_values as $option_value) {
            $attachedPollsCount = fake()->numberBetween(2, 5);
            $attachedPolls = Poll::query()->select(['id'])->inRandomOrder()->limit($attachedPollsCount)->get();
            Option::factory(1)->hasAttached($attachedPolls, ['order' => 1])->create(['value' => $option_value]);
        }

        $options = Option::all();
        Response::factory(10)->recycle($users)->recycle($polls)->recycle($options)->create();
    }
}
