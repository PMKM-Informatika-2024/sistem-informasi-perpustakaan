<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'role_id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make(config('env.secret')),
        ]);
    }
}
