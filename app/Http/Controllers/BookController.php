<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BookController
{
    public function index()
    {
        Session::flash('menu', 'Buku');

        return view('dashboard.books', [
            'title' => 'Buku - Manajemen Perpustakaan',
        ]);
    }

    public function deleteAll()
    {
        Book::query()->delete();

        return back()->with('success', 'Semua buku berhasil dihapus');
    }
}
