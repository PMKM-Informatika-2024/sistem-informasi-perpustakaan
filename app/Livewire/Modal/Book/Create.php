<?php

namespace App\Livewire\Modal\Book;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    public string $category_id = '';

    public string $code;

    public string $stock;

    public string $author;

    public string $title;

    public string $publisher;

    public string $year;

    public string $source;

    public string $description;

    public function rules()
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'code' => ['required', 'string', Rule::unique('books', 'code')->whereNull('deleted_at')],
            'stock' => 'required|integer',
            'author' => 'required',
            'title' => 'required|string',
            'publisher' => 'required',
            'year' => 'required',
            'source' => 'required',
            'description' => 'nullable',
        ];
    }

    public function create()
    {
        $data = $this->validate();

        Book::create([...$data, 'initial' => $data['stock']]);

        Session::flash('success', 'Buku berhasil ditambahkan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage book');
    }

    public function render()
    {
        return view('livewire.modal.book.create')->with([
            'categories' => Category::all(),
        ]);
    }
}
