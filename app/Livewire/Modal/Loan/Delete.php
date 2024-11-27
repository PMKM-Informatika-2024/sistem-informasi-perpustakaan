<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Loan;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class Delete extends Component
{
    public ?Loan $loan = null;

    #[On('delete')]
    public function prepare(string $id)
    {
        $this->loan = Loan::findOrFail($id);

        $this->dispatch('open-modal', modal: 'delete');
    }

    public function delete()
    {
        $this->loan->delete();

        Session::flash('success', 'Peminjaman berhasil dihapus');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage peminjaman');
    }

    public function render()
    {
        return view('livewire.modal.loan.delete');
    }
}
