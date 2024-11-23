<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController
{
    public function index()
    {
        Session::put('menu', 'Manage User');

        return view('dashboard.user', [
            'title' => 'Manage User - Manajemen Perpustakaan',
            'roles' => Role::all()->reject(function ($role) {
                return $role->name === 'admin';
            }),
        ]);
    }

    public function deleteAll()
    {
        User::excludeAdmin()->delete();

        return back()->with('success', 'Semua data berhasil dihapus');
    }
}
