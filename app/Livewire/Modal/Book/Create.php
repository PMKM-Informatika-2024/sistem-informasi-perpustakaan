<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    #[Validate(rule: "required", message: "Kode buku tidak boleh kosong")]
    #[Validate(rule: "string", message: "Kode buku harus berupa string")]
    #[Validate(rule: "unique:books,code", message: "Kode buku sudah ada")]
    public string $code;

    #[Validate(rule: "required", message: "Judul buku tidak boleh kosong")]
    #[Validate(rule: "string", message: "Judul buku harus berupa string")]
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
