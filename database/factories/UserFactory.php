<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'role_id' => fake()->randomElement([2, 3]),
            'name' => fake()->name(),
            'email' => fake()->unique()->freeEmail(),
            'phone_number' => fake()->unique()->e164PhoneNumber(),
            'address' => fake()->address(),
            'password' => Hash::make(config('env.secret')),
        ];
    }
}
