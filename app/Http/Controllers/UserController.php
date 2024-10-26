<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMemberRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function index(Request $request)
    {
        return view("dashboard.manage.user", [
            "title" => "Manage Member",
            "roles" => Role::all()->reject(function ($role) {
                return $role->name === "admin";
            }),
        ]);
    }

    public function addMember(AddMemberRequest $request)
    {
        $data = $request->validated();

        User::create([
            ...$data,
            "password" => Hash::make(config("env.secret")),
        ]);

        return back()->with("success", "Data berhasil ditambahkan");
    }

    public function deleteAllMember()
    {
        User::where("role_id", "!=", 1)->delete();

        return back()->with("success", "Semua data berhasil dihapus");
    }
}
