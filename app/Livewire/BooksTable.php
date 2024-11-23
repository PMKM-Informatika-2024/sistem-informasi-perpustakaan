<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class BooksTable extends Component
{
    use WithPagination;

    #[Url(as: 'judul')]
    public string $keyword = '';

    public function render()
    {
        return view('livewire.books-table')->with([
            "books" => Book::withTrashed()->where("title", "LIKE", "%{$this->keyword}%")->latest()->withPaginate(),
            "categories" => Category::withTrashed()->get(),
        ]);
    }

    public function paginationView()
    {
        return "vendor.pagination.tailwind";
    }
}
