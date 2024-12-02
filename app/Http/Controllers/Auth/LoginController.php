<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rules\Password;

class LoginController
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login - Manajemen Perpustakaan',
            'image' => User::all()->pluck('login_image')->first(),
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (! Auth::attempt($data)) {
            return Response::redirectTo('/login')->with('error', 'Email atau password salah')->withInput([
                'username' => $data['username'],
            ]);
        }

        return Response::redirectTo('/dashboard');
    }

    public function edit()
    {
        return view('dashboard.profile.credentials', [
            'title' => 'Edit Credentials - Manajemen Perpustakaan',
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'username' => 'nullable|string',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        User::query()->where('id', Auth::id())->update([
            ...$data,
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('success', 'Informasi Login berhasil diubah');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return Response::redirectTo('/login');
    }
}
