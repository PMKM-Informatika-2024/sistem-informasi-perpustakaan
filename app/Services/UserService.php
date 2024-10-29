<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService
{
    public static function store(array $data)
    {
        User::create([
            ...$data,
            "password" => Hash::make(config("env.secret"))
        ]);
    }

    public static function promote(User $user)
    {
        $user->update([
            "role_id" => 2,
        ]);
    }

    public static function demote(User $user)
    {
        $user->update([
            "role_id" => 3,
        ]);
    }
}
