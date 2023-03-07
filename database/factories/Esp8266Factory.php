<?php

namespace Database\Factories;

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
        

        return [
            'arduino_key' => Str::random(10),
            'temperature' => rand(15,30) + rand(0, 10) / 10 + + rand(0, 10) / 100,
        ];
    }
}
