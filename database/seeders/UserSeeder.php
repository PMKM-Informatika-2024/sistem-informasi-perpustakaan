<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(100)->create();
        User::factory()->create([
            'role_id' => Role::first('id'),
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make(config('env.secret')),
        ]);
    }
}
