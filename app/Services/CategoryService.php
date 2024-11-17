<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    private static function flash(string $message)
    {
        Session::flash('success', $message);
    }

    public static function create(array $data)
    {
        Category::create($data);

        self::flash('Berhasil Menambahkan kategori');
    }

    public static function update(Category $category, array $data)
    {
        $category->update($data);

        self::flash('Berhasil Mengubah kategori');
    }

    public static function delete(Category $category)
    {
        $category->delete();

        self::flash('Berhasil Menghapus kategori');
    }
}
