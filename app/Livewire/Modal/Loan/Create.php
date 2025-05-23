<?php

namespace App\Livewire\Modal\Loan;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    #[Validate(rule: 'required|exists:books,id')]
    public string $book_id = '';

    #[Validate(rule: 'required|exists:members,id')]
    public string $member_id = '';

    #[Validate(rule: 'required')]
    public string $duration = '';

    private Carbon $due;

    public function create()
    {
        $data = $this->validate();
        $this->getDueDate();

        Loan::create([
            ...$data,
            'status' => 'dipinjam',
            'borrow_date' => Carbon::now(),
            'due_date' => $this->due,
        ]);

        $book = Book::findOrFail($this->book_id);
        $book->update(['stock' => $book->stock - 1]);

        Session::flash('success', 'Peminjaman berhasil ditambahkan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage peminjaman');
    }

    public function render()
    {
        return view('livewire.modal.loan.create')->with([
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
