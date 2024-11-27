<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Loan;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Done extends Component
{
    public ?Loan $loan = null;

    #[On("done")]
    public function prepare(string $id)
    {
        $this->loan = Loan::findOrFail($id);

        $this->dispatch("open-modal", modal: "done");
    }

    public function done()
    {
        $this->loan->update([
            "status" => 1
        ]);

        Session::flash("success", "Peminjaman berhasil diselesaikan");
        $this->dispatch("close-modal");

        return $this->redirectRoute("manage peminjaman");
    }

    public function render()
    {
        return view('livewire.modal.loan.done');
    }
}
