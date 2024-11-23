<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Delete extends Component
{
    public function delete(string $title)
    {
        $book = Book::where('title', $title)->firstOrFail();

        $book->delete();

        Session::flash('success', 'Buku berhasil dihapus');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage book');
    }

    public function render()
    {
        return view('livewire.modal.book.delete');
    }
}
