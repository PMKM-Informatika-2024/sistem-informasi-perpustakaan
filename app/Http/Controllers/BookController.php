<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BookController
{
    public function index()
    {
        Session::flash('menu', 'Manage Buku');

        return view('dashboard.books', [
            'title' => 'Manage Book - Manajemen Perpustakaan',
        ]);
    }

    public function deleteAll()
    {
        Book::query()->delete();

        return back()->with('success', 'Semua buku berhasil dihapus');
    }
}
