<?php

namespace App\Livewire\Karyawan\Book;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Url;

class BookTable extends Component
{
    #[Url("judul")]
    public string $keyword = '';


    public function render()
    {
        return view('livewire.karyawan.book.book-table')->with([
            "categories" => Category::all(),
            "books" => Book::where('title', "LIKE", "%{$this->keyword}%")->latest()->get()
        ]);
    }
}
