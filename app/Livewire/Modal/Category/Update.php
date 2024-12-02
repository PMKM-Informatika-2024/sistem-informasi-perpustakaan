<?php

namespace App\Livewire\Modal\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;

class Update extends Component
{
    public ?Category $category = null;

    public string $name;

    #[On("update")]
    public function prepare(string $id)
    {
        $this->category = Category::findOrFail($id);

        $this->name = $this->category->name;
        $this->dispatch("open-modal", modal: "update category");
    }

    public function update()
    {
        $data = $this->validate();

        $this->category->update($data);

        Session::flash("success", "Kategori berhasil diperbarui");
        $this->dispatch("close-modal");

        return $this->redirectRoute("manage category");
    }

    public function rules()
    {
        return [
            "name" => ["required", "string", Rule::unique("categories", "name")->ignore($this->category->id)],
        ];
    }

    public function render()
    {
        return view('livewire.modal.category.update');
    }
}
