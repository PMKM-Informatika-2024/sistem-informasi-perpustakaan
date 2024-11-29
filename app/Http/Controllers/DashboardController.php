<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class DashboardController
{
    public function index()
    {
        Session::put("menu", "Dashboard");

        return view('dashboard.dashboard', [
            'title' => 'Dashboard - Manajemen Perpustakaan',
            "members" => Member::all(),
            "books" => Book::all(),
            "loans" => Loan::where("status", 1)->get()
        ]);
    }

    public function edit()
    {
        Session::put("menu", "Edit Profile");

        return view("dashboard.profile", [
            "title" => "Edit Profile - Manajemen Perpustakaan",
            "user" => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "username" => "required",
            "password" => ["required", "confirmed", Password::min(8)->numbers()]
        ]);

        User::query()->where("id", Auth::id())->update([
            ...$data,
            "password" => Hash::make($data["password"])
        ]);

        return redirect()->route("dashboard")->with("success", "Profile berhasil diubah");
    }
}
