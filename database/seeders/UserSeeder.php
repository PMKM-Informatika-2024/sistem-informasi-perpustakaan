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
            'name' => 'Phasya Ananta',
            'username' => 'admin',
            'password' => Hash::make(config('env.secret')),
        ]);
    }
}
