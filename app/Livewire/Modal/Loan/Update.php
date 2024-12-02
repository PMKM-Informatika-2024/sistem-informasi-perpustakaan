<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Update extends Component
{
    public ?Loan $loan = null;

    #[Validate(rule: 'required|exists:members,id')]
    public string $member_id = '';

    #[Validate(rule: 'required|exists:books,id')]
    public string $book_id = '';

    #[On('update')]
    public function prepare(string $id)
    {
        $this->loan = Loan::findOrFail($id);

        $this->member_id = $this->loan->member_id;
        $this->book_id = $this->loan->book_id;

        $this->dispatch('open-modal', modal: 'update peminjaman');
    }

    public function update()
    {
        $data = $this->validate();

        $this->loan->update($data);

        Session::flash('success', 'Peminjaman berhasil diupdate');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage peminjaman');
    }

    public function render()
    {
        return view('livewire.modal.loan.update')->with([
            'books' => Book::where('stock', '>', 0)->latest()->get(),
            'members' => Member::latest()->get(),
        ]);
    }
}
