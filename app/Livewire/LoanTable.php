<?php

namespace App\Livewire;

use App\Models\Loan;
use Livewire\Component;

class LoanTable extends Component
{
    public function render()
    {
        return view('livewire.loan-table')->with([
            'loans' => Loan::all(),
        ]);
    }
}
