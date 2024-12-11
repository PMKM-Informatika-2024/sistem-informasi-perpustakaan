<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Update extends Component
{
    public ?Loan $loan = null;

    #[Validate(rule: 'required|exists:members,id')]
    public string $member_id = '';

    #[Validate(rule: 'required|exists:books,id')]
    public string $book_id = '';

    #[Validate(rule: 'required')]
    public string $duration = '';

    private Carbon $due;

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
        $this->getDueDate();

        $this->loan->update([
            ...$data,
            'due_date' => $this->due,
        ]);

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

    private function getDueDate()
    {
        switch ($this->duration) {
            case '1':
                $this->due = Carbon::now()->addDays(1);
                break;
            case '3':
                $this->due = Carbon::now()->addDays(3);
                break;
            case '5':
                $this->due = Carbon::now()->addDays(5);
                break;
            case '7':
                $this->due = Carbon::now()->addDays(7);
                break;
            case '30':
                $this->due = Carbon::now()->addMonths(1);
                break;
            case '60':
                $this->due = Carbon::now()->addMonths(2);
                break;
            case '90':
                $this->due = Carbon::now()->addMonths(3);
                break;
            case '365':
                $this->due = Carbon::now()->addYears(1);
                break;
            default:
                $this->due = Carbon::now();
                break;
        }
    }
}
