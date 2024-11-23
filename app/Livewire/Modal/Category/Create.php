<?php

namespace App\Livewire\Modal\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;

class Create extends Component
{
    #[Validate(rule: "required|unique:categories,name")]
    public string $name;

    #[Validate(rule: 'required|string|max:255')]
    public string $description;

    public function create()
    {
        $data = $this->validate();

        Category::create([
            ...$data,
            "name" => Str::title($data["name"]),
            "slug" => Str::slug($data["name"]),
        ]);

        Session::flash("success", "Kategori berhasil ditambahkan");
        $this->dispatch("close-modal");
        return $this->redirectRoute('manage category');
    }

    public function render()
    {
        return view('livewire.modal.category.create');
    }
}
