<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\channel;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user_channel>
 */
class UserChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $channel_count = channel::all()->count();
        $channel = [];
        for ($i = 1; $i <= $channel_count; $i++) {
            array_push($channel, $i);
        }
        $channel = $this->faker->unique()->randomElement($channel);
        $channelId = $channel;

        return [
            'user_id' => fake()->unique(true)->numberBetween(1,10),
            'channel_id' => $channelId,
        ];
    }
}
