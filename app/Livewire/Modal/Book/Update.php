<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class Update extends Component
{
    public ?Book $book = null;

    public string $code;

    public string $title;

    public string $author;

    public string $publisher;

    public string $year;

    public string $category_id;

    #[On('prepare book')]
    public function prepare(string $id)
    {
        $this->book = Book::withTrashed()->findOrFail($id);

        $this->code = $this->book->code;
        $this->title = $this->book->title;
        $this->author = $this->book->author;
        $this->publisher = $this->book->publisher;
        $this->year = $this->book->year;
        $this->category_id = $this->book->category_id;

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
            'author' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function render()
    {
        return view('livewire.modal.book.update')->with([
            'categories' => Category::all(),
        ]);
    }
}
