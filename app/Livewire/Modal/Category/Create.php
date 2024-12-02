<?php

namespace App\Livewire\Modal\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    #[Validate(rule: 'required|unique:categories,name')]
    public string $name;

    public function create()
    {
        $data = $this->validate();

        Category::create($data);

        Session::flash('success', 'Kategori berhasil ditambahkan.');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage category');
    }

    public function render()
    {
        return view('livewire.modal.category.create');
    }
}
