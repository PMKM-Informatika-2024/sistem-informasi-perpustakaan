<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Loan;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class Done extends Component
{
    public ?Loan $loan = null;

    #[On('done')]
    public function prepare(string $id)
    {
        $this->loan = Loan::findOrFail($id);

        $this->dispatch('open-modal', modal: 'done');
    }

    public function done()
    {
        $this->loan->update([
            'status' => 'selesai',
            'return_date' => Carbon::now(),
            'fine' => calculateFine($this->loan->due_date, Carbon::now())
        ]);

        $book = $this->loan->book;
        $book->update(['stock' => $book->stock + 1]);

        Session::flash('success', 'Peminjaman berhasil diselesaikan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage peminjaman');
    }

    public function render()
    {
        return view('livewire.modal.loan.done');
    }
}
