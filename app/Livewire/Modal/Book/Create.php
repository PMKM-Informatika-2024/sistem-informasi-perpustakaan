<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    #[Validate(rule: 'required', message: 'Kode buku tidak boleh kosong')]
    #[Validate(rule: 'string', message: 'Kode buku harus berupa string')]
    #[Validate(rule: 'unique:books,code', message: 'Kode buku sudah ada')]
    public string $code;

    #[Validate(rule: 'required', message: 'Stok buku tidak boleh kosong')]
    #[Validate(rule: 'integer', message: 'Stok buku harus berupa angka')]
    public string $stock;

    #[Validate(rule: 'required', message: 'Penulis buku tidak boleh kosong')]
    public string $author;

    #[Validate(rule: 'required', message: 'Judul buku tidak boleh kosong')]
    #[Validate(rule: 'string', message: 'Judul buku harus berupa string')]
    public string $title;

    #[Validate(rule: 'required', message: 'Penerbit buku tidak boleh kosong')]
    public string $publisher;

    #[Validate(rule: 'required', message: 'Tahun terbit buku tidak boleh kosong')]
    public string $year;

    #[Validate(rule: 'required', message: 'Sumber buku tidak boleh kosong')]
    public string $source;

    #[Validate(rule: 'required', message: 'Deskripsi buku tidak boleh kosong')]
    public string $description;

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
