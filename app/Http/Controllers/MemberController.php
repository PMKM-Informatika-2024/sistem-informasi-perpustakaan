<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class MemberController
{
    public function index()
    {
        Session::put('menu', 'Manage Member');

        return view('dashboard.members', [
            'title' => 'Manage Member - Manajemen Perpustakaan',
        ]);
    }

    public function deleteAll()
    {
        User::excludeAdmin()->delete();

        return back()->with('success', 'Semua member berhasil dihapus');
    }
}
