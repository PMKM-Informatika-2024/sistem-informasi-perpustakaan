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

    public function create()
    {
        Session::put('menu', "Tambah Kategori");

        return view("dashboard.category.create", [
            "title" => "Tambah Kategori - Manajemen Perpustakaan"
        ]);
    }

    public function store(Create $request)
    {
        $data = $request->validated();

        Category::create([
            ...$data,
            "slug" => Str::slug($data['name'])
        ]);

        return redirect()->route("manage category")->with("success", "Berhasil Menambahkan Kategori");
    }

    public function edit(Category $category)
    {
        Session::put('menu', "Edit Kategori");

        return view("dashboard.category.edit", [
            "title" => "Edit Kategori - Manajemen Perpustakaan",
            "category" => $category
        ]);
    }

    public function update(Update $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        return redirect()->route("manage category")->with("success", "Berhasil Memperbarui kategori");
    }
}
