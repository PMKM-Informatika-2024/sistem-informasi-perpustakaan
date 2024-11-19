<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService
{
    private static function flash(string $message)
    {
        Session::flash('success', $message);
    }

    public static function promote(User $user)
    {
        $user->update(['role_id' => Role::where('name', 'karyawan')->pluck('id')]);

        self::flash('User berhasil dipromosikan');
    }

    public static function demote(User $user)
    {
        $user->update(['role_id' => Role::where('name', 'member')->pluck('id')]);

        self::flash('User berhasil didegradasi');
    }

    public static function delete(User $user)
    {
        $user->delete();

        self::flash('User berhasil dihapus');
    }
}
