<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class BookController
{
    public function index()
    {
        Session::put('menu', 'Manage Buku');

        return view('dashboard.books', [
            'title' => 'Manage Buku - Manajemen Perpustakaan',
            'books' => Book::all(),
            'categories' => Category::all(),
        ]);
    }
}
