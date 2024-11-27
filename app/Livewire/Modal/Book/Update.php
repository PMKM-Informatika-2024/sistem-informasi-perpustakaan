<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class Update extends Component
{
    public ?Book $book = null;

    public string $code;

    public string $title;

    #[On('update')]
    public function prepare(string $id)
    {
        $this->book = Book::findOrFail($id);

        $this->code = $this->book->code;
        $this->title = $this->book->title;

        $this->dispatch('open-modal', modal: 'update book');
    }

    public function update()
    {
        $data = $this->validate();

        $this->book->update($data);

        Session::flash('success', 'Buku berhasil diperbarui');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage book');
    }

    public function rules()
    {
        return [
            'code' => ['required', 'string', 'max:255', Rule::unique('books', 'code')->ignore($this->book->id)],
            'title' => 'required|string',
        ];
    }

    public function render()
    {
        return view('livewire.modal.book.update');
    }
}
