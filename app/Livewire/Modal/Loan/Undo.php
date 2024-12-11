<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Loan;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class Redo extends Component
{
    public ?Loan $loan = null;

    #[On('redo')]
    public function prepare(string $id)
    {
        $this->loan = Loan::findOrFail($id);

        $this->dispatch('open-modal', modal: 'redo');
    }

    public function redo()
    {
        $this->loan->update(['status' => 0]);

        Session::flash('success', 'Belum Diselesaikan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage peminjaman');
    }

    public function render()
    {
        return view('livewire.modal.loan.redo');
    }
}
