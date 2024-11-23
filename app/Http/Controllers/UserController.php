<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Http\Requests\User\Create;
use App\Http\Requests\User\Update;

class UserController
{
    public function index()
    {
        Session::put("menu", "Manage User");

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
