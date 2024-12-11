<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;

class BookTable extends Component
{
    #[Url('judul')]
    public string $keyword = '';

    public ?Category $category = null;

    public function render()
    {
        if (request()->has('kategori')) {
            $this->category = Category::where('slug', request()->kategori)->first();

            return view('livewire.book-table')->with([
                'categories' => Category::all(),
                'books' => Book::where('title', 'LIKE', "%{$this->keyword}%")->where('category_id', $this->category?->id)->latest()->get(),
            ]);
        }

        return view('livewire.book-table')->with([
            'categories' => Category::all(),
            'books' => Book::where('title', 'LIKE', "%{$this->keyword}%")->latest()->get(),
        ]);
    }
}
