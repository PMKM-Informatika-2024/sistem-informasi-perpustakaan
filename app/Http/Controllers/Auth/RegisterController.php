<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\Auth\Register;
use Illuminate\Support\Facades\Response;
use App\Models\Role;

class RegisterController
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register - Manajemen Perpustakaan',
        ]);
    }

    public function register(Register $request)
    {
        $data = $request->validated();

        User::create([
            'role_id' => Role::where('name', 'member')->first()->id,
            ...$data,
        ]);

        return Response::redirectTo('/login')->withInput([
            'username' => $data['username'],
        ]);
    }
}
