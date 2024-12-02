<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class WebsiteController
{
    public function index()
    {
        Session::put('menu', 'Update Foto Sampul');

        return view('dashboard.website', [
            'title' => 'Edit Website - Manajemen Perpustakaan',
            'image' => User::pluck('login_image')->first(),
        ]);
    }

    public function update(Request $request)
    {
        $oldImagePath = User::pluck('login_image')->first();

        if ($oldImagePath) {
            Storage::delete($oldImagePath);
        }

        $path = $request->file('cover')->store('image/cover');
        User::first()->update(['login_image' => $path]);

        return redirect()->route('login');
    }
}
