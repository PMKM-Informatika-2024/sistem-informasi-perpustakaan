<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            "role_id" => fake()->randomElement([2, 3]),
            "name" => fake()->name(),
            "email" => fake()->unique()->freeEmail(),
            "phone_number" => fake()->phoneNumber(),
            "address" => fake()->address(),
            "password" => Hash::make(config("env.secret")),
        ];
    }
}
