<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DeleteAllController
{
    private $model;

    public function delete(string $type)
    {
        if ($type == "book") {
            $this->model = "Buku";
            $this->deleteAllBook();
        } else if ($type == "user") {
            $this->model = "Member";
        } else if ($type == "category") {
            $this->model = "Kategori";
        }

        return back()->with("success", "Berhasil menghapus semua {$this->model}");
    }

    private function deleteAllBook()
    {
        Book::all()->each(fn(Book $book) => $book->delete());
    }

    private function deleteAllUser()
    {
        // 
    }

    private function deleteAllCategory()
    {
        // 
    }
}
