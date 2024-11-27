<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Url;

class BookTable extends Component
{
    #[Url("judul")]
    public string $keyword = '';

    public function render()
    {
        return view('livewire.book-table')->with([
            "books" => Book::where('title', "LIKE", "%{$this->keyword}%")->latest()->get()
        ]);
    }
}
