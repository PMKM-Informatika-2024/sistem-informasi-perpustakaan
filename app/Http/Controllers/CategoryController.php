<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController
{
    public function index()
    {
        return view('dashboard.categories', [
            'title' => 'Manage Kategori',
            'categories' => Category::all(),
        ]);
    }
}
