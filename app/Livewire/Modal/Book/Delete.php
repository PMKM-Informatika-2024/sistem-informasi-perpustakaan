<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Delete extends Component
{
    public ?Book $book = null;

    #[On('delete')]
    public function prepare(string $id)
    {
        $this->book = Book::findOrFail($id);

        $this->dispatch('open-modal', modal: 'delete book');
    }

    public function delete()
    {
        $this->book->delete();

        Session::flash('success', 'Buku berhasil dihapus');
        $this->dispatch('close-modal');
        return $this->redirectRoute('manage book');
    }

    public function render()
    {
        return view('livewire.modal.book.delete');
    }
}
