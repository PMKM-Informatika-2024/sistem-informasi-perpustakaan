<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Response;

class RegisterController
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register - Manajemen Perpustakaan',
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        User::create([
            'role_id' => 3,
            ...$data,
        ]);

        return Response::redirectTo('/login')->withInput([
            'email' => $data['email'],
        ]);
    }
}
