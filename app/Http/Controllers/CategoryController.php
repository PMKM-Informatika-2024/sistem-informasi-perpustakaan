<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController
{
    public function index()
    {
        Session::put('menu', 'Kategori');

        return view('dashboard.category', [
            'title' => 'Kategori - Manajemen Perpustakaan',
            'categories' => Category::all(),
        ]);
    }

    public function deleteAll()
    {
        Category::all()->each(fn (Category $category) => $category->delete());

        return back()->with('success', 'Semua kategori berhasil dihapus');
    }
}
