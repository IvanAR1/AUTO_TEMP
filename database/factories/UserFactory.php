<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_user' => fake()->name(),
            'lastname_user' => fake()->name(),
            'alias_user' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_user_verified_at' => now(),
            'password' => Hash::make(fake()->randomElement(['12345678', '87654321' , '159357002'])),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_user_verified_at' => null,
        ]);
    }
}
