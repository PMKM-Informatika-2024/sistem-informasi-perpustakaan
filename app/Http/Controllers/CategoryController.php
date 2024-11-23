<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController
{
    public function index()
    {
        Session::put('menu', 'Manage Kategori');

        return view('dashboard.categories', [
            'title' => 'Manage Kategori - Manajemen Perpustakaan',
            'categories' => Category::withTrashed()->get(),
        ]);
    }
}
