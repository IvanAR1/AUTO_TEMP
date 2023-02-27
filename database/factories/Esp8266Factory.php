<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\esp8266>
 */
class Esp8266Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_count = User::all()->count();
        $user = [];
        for ($i = 1; $i <= $user_count; $i++) {
            array_push($user, $i);
        }
        $user = $this->faker->unique()->randomElement($user);
        $userId = $user;

        return [
            'user_id' => $userId,
            'api_key' => Str::random(10),
            'temperature' => rand(15,30) + rand(0, 10) / 10 + + rand(0, 10) / 100,
            'humidity' => rand(15,30) + rand(0, 10) / 10 + + rand(0, 10) / 100,
        ];
    }
}
