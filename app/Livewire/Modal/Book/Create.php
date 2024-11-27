<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    #[Validate('required|string|unique:books,code')]
    public string $code;

    #[Validate('required|string')]
    public string $title;

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
        return view('livewire.modal.book.create');
    }
}
