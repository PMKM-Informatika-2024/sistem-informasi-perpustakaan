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
    public string $description;

    #[On(("prepare for update"))]
    public function prepare(string $id)
    {
        $this->category = Category::query()->findOrFail($id);

        $this->name = $this->category->name;
        $this->description = $this->category->description;

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
            "name" => ['required', 'string', 'max:255', Rule::unique(Category::class, 'name')->ignore($this->category->id)],
            "description" => ['required', 'string', 'max:255'],
        ];
    }

    public function render()
    {
        return view('livewire.modal.category.update');
    }
}
