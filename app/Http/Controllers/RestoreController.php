<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;

class RestoreController
{
    private string $model = '';

    public function restore(string $type, string $id)
    {

        if ($type === 'book') {
            $this->model = 'Buku';
            $this->restoreBook($id);
        } elseif ($type === 'user') {
            $this->model = 'Member';
            $this->restoreUser($id);
        } elseif ($type === 'category') {
            $this->model = 'Kategori';
            $this->restoreCategory($id);
        }

        return back()->with('success', "{$this->model} Berhasil Dikembalikam");
    }

    private function restoreBook(string $id)
    {
        $book = Book::withTrashed()->findOrFail($id);
        $book->restore();
    }

    private function restoreUser(string $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
    }

    private function restoreCategory(string $id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
    }
}
