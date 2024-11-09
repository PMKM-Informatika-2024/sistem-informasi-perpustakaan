<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

class UserController
{
    public function index()
    {
        return view('dashboard.manage.user', [
            'title' => 'Manage User',
            'roles' => Role::all()->reject(function ($role) {
                return $role->name === 'admin';
            }),
        ]);
    }

    public function deleteAll()
    {
        User::where('role_id', '!=', 1)->delete();

        return back()->with('success', 'Semua data berhasil dihapus');
    }
}
