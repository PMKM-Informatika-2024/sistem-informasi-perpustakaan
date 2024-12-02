<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController
{
    public function index()
    {
        Session::put('menu', 'Edit Profile');

        return view('dashboard.profile.general', [
            'title' => 'Edit Profile - Manajemen Perpustakaan',
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $path = null;

        $data = $request->validate([
            'avatar' => ['nullable', File::image()->max('2mb')],
            'name' => 'required',
        ]);

        if ($request->hasFile('avatar')) {
            $oldAvatar = Auth::user()->avatar;

            if ($oldAvatar) {
                Storage::delete($oldAvatar);
            }

            $path = $request->file('avatar')->store('avatar');
        }

        User::where('id', Auth::id())->update([
            'name' => $data['name'],
            'avatar' => $path,
        ]);

        return back()->with('success', 'Profile berhasil diubah');
    }
}
