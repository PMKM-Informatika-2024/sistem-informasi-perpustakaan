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

    public string $author;

    public string $title;

    public string $publisher;

    public string $year;

    public string $source;

    public string $description;

    #[On('update')]
    public function prepare(string $id)
    {
        $this->book = Book::findOrFail($id);

        $this->code = $this->book->code;
        $this->author = $this->book->author;
        $this->title = $this->book->title;
        $this->publisher = $this->book->publisher;
        $this->year = $this->book->year;
        $this->source = $this->book->source;
        $this->description = $this->book->description;

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
            'code' => ['required', 'string', Rule::unique('books', 'code')->ignore($this->book->id)->whereNull('deleted_at')],
            'author' => 'required|string',
            'title' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required',
            'source' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Kode buku tidak boleh kosong',
            'code.string' => 'Kode buku harus berupa string',
            'code.unique' => 'Kode buku sudah ada',
            'title.required' => 'Judul buku tidak boleh kosong',
            'title.string' => 'Judul buku harus berupa string',
        ];
    }

    public function render()
    {
        return view('livewire.modal.book.update');
    }
}
