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
        return view('dashboard.user', [
            'title' => 'Manage User',
            'roles' => Role::all()->reject(function ($role) {
                return $role->name === 'admin';
            }),
        ]);
    }

    public function create()
    {
        return view("dashboard.user.create", [
            'title' => 'Tambah Member Baru - Manajemen Perpustakaan',
            'roles' => Role::all()->reject(function ($role) {
                return $role->name === 'admin';
            }),
        ]);
    }

    public function store(Create $request)
    {
        $data = $request->validated();

        User::create([...$data, "password" => Hash::make(config("env.secret"))]);
        return redirect()->route("manage user")->with("success", "Berhasil Menambahkan Member");
    }

    public function edit(User $user)
    {
        return view("dashboard.user.edit", [
            "title" => "Edit Member - Manajemen Perpustakaan",
            "user" => $user
        ]);
    }

    public function update(Update $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);
        return redirect()->route("manage user")->with("success", "Berhasil Mengubah Data Member");
    }

    public function deleteAll()
    {
        User::excludeAdmin()->delete();

        return back()->with('success', 'Semua data berhasil dihapus');
    }
}
