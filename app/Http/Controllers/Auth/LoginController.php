<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class LoginController
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login - Manajemen Perpustakaan',
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if (! Auth::attempt($data)) {
            return Response::redirectTo('/login')->with('error', 'Email atau password salah')->withInput([
                'username' => $data['username'],
            ]);
        }

        return Response::redirectTo('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return Response::redirectTo('/login');
    }
}
