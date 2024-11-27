<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Loan;

class LoanTable extends Component
{
    public function render()
    {
        return view('livewire.loan-table')->with([
            "loans" => Loan::all()
        ]);
    }
}
