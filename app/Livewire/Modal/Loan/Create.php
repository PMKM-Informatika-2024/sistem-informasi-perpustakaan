<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    #[Validate(rule: 'required|exists:books,id')]
    public $book_id = '';

    #[Validate(rule: 'required|exists:members,id')]
    public $member_id = '';

    public function create()
    {
        $data = $this->validate();

        Loan::create([...$data, 'status' => 0]);

        $book = Book::findOrFail($this->book_id);
        $book->update(['stock' => $book->stock - 1]);

        Session::flash('success', 'Peminjaman berhasil ditambahkan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage peminjaman');
    }

    public function render()
    {
        return view('livewire.modal.loan.create')->with([
            'books' => Book::where('stock', '>', 0)->latest()->get(),
            'members' => Member::latest()->get(),
        ]);
    }
}
