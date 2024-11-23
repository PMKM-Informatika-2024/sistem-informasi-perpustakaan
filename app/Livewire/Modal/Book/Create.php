<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    #[Validate('required|string|unique:books,code')]
    public string $code;

    #[Validate('required|string')]
    public string $title;

    #[Validate('required|string')]
    public string $author;

    #[Validate('required|string')]
    public string $publisher;

    #[Validate('required|numeric')]
    public string $year;

    #[Validate('required|exists:categories,id')]
    public string $category_id = '';

    public function create()
    {
        $data = $this->validate();

        Book::create($data);

        Session::flash('success', 'Buku berhasil ditambahkan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage book');
    }

    public function render()
    {
        return view('livewire.modal.book.create')->with([
            'categories' => Category::all(),
        ]);
    }
}
