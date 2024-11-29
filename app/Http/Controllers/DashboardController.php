<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;

class DashboardController
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'title' => 'Dashboard - Manajemen Perpustakaan',
            "members" => Member::all(),
            "books" => Book::all(),
            "loans" => Loan::where("status", 1)->get()
        ]);
    }
}
