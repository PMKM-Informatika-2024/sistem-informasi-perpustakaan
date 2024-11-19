<?php

namespace Database\Factories;

use App\Models\Role;
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
            'role_id' => fake()->randomElement(Role::all()->reject(fn(Role $role) => $role->name === 'admin')->pluck('id')),
            'name' => fake()->name(),
            'email' => fake()->unique()->freeEmail(),
            'phone_number' => fake()->unique()->e164PhoneNumber(),
            'address' => fake()->address(),
            'password' => Hash::make(config('env.secret')),
        ];
    }
}
