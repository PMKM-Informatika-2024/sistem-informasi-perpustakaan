<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LoginController
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login - Manajemen Perpustakaan',
        ]);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (! Auth::attempt($data)) {
            return Response::redirectTo('/login')->with('error', 'Email atau password salah')->withInput([
                'email' => $data['email'],
            ]);
        }

        return Response::redirectTo('/dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return Response::redirectTo('/login');
    }
}
