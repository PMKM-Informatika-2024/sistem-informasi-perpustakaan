<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Loan;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class Undo extends Component
{
    public ?Loan $loan = null;

    #[On('undo')]
    public function prepare(string $id)
    {
        $this->loan = Loan::findOrFail($id);

        $this->dispatch('open-modal', modal: 'undo');
    }

    public function undo()
    {
        $this->loan->update([
            'status' => 'dipinjam',
            'return_date' => null,
            'fine' => null,
        ]);

        Session::flash('success', 'Belum Diselesaikan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage peminjaman');
    }

    public function render()
    {
        return view('livewire.modal.loan.undo');
    }
}
