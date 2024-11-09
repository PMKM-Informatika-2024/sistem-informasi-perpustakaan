<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService
{
    private static function flash(string $message)
    {
        Session::flash("success", $message);
    }

    public static function create(array $data)
    {
        User::create([
            ...$data,
            "password" => Hash::make(config("env.secret"))
        ]);

        self::flash("User berhasil ditambahkan");
    }

    public static function update(User $user, array $data)
    {
        $user->update($data);

        self::flash("User berhasil diperbarui");
    }

    public static function promote(User $user)
    {
        $user->update(["role_id" => 2]);

        self::flash("User berhasil dipromosikan");
    }

    public static function demote(User $user)
    {
        $user->update(["role_id" => 3]);

        self::flash("User berhasil didegradasi");
    }

    public static function delete(User $user)
    {
        $user->delete();

        self::flash("User berhasil dihapus");
    }
}
