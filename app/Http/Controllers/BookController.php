<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Requests\Book\Create;
use App\Http\Requests\Book\Update;

class BookController
{
    public function index()
    {
        Session::put("menu", "Manage Buku");

        return view("dashboard.books", [
            "title" => "Manage Buku - Manajemen Perpustakaan",
            "books" => Book::all(),
            "categories" => Category::all()
        ]);
    }
}
