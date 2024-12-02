<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Support\Facades\Session;

class DashboardController
{
    public function index()
    {
        Session::put('menu', 'Dashboard');

        return view('dashboard.dashboard', [
            'title' => 'Dashboard - Manajemen Perpustakaan',
            'members' => Member::all(),
            'books' => Book::all(),
            'loans' => Loan::where('status', 0)->get(),
        ]);
    }
}
