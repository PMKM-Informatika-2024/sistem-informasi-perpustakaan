<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Session;

class MemberController
{
    public function index()
    {
        Session::put('menu', 'Member');

        return view('dashboard.members', [
            'title' => 'Member - Manajemen Perpustakaan',
        ]);
    }

    public function deleteAll()
    {
        Member::all()->each(fn (Member $member) => $member->delete());

        return back()->with('success', 'Semua member berhasil dihapus');
    }
}
