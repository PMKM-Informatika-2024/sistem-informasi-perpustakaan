<?php

namespace App\Livewire\Modal\Loan;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Loan;

class Missing extends Component
{
    public ?Loan $loan = null;

    #[On('missing')]
    public function prepare(string $id)
    {
        $this->loan = Loan::findOrFail($id);

        $this->dispatch('open-modal', modal: 'missing');
    }

    public function missing()
    {
        $this->loan->update([
            'status' => 'hilang',
            'fine' => $this->loan->book->price
        ]);

        $this->dispatch('close-modal');

        return $this->redirectRoute('manage peminjaman');
    }

    public function render()
    {
        return view('livewire.modal.loan.missing');
    }
}
