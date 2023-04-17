<?php

namespace Database\Factories;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'email_verified_at' => now(),
            'role' => fake()->randomElement(Role::cases()),
            'wallet' => rand(1500, 2500),
            'scores' => rand(10, 250),
            'slug' => 'id' . rand(1000000, 9999999),
            'password' => Hash::make('password')
        ];
    }
}
