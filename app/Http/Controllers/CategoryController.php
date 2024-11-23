<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\Create;
use App\Http\Requests\Category\Update;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController
{
    public function index()
    {
        Session::put('menu', "Manage Kategori");

        return view('dashboard.categories', [
            'title' => "Manage Kategori - Manajemen Perpustakaan",
            'categories' => Category::all(),
        ]);
    }
}
