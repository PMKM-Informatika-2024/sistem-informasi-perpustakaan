<?php

namespace App\Livewire\Modal\Category;

use Livewire\Component;
use App\Models\Category;
use App\Services\CategoryService;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;

class Update extends Component
{
    public ?Category $category = null;

    public string $name = '';

    #[Validate('required', message: 'Harus Diisi')]
    #[Validate('max:255', message: 'Maksimal 255 Karakter')]
    public string $description = '';

    #[On('set-id')]
    public function prepareCategory($id)
    {
        $this->category = Category::findOrFail($id);

        $this->name = $this->category->name;
        $this->description = $this->category->description;

        $this->dispatch('open-modal', modal: 'update category');
    }

    public function update()
    {
        $this->validate();

        CategoryService::update($this->category, $this->all());

        $this->dispatch('close-modal');
        return $this->redirectRoute('manage categories');
    }

    public function rules()
    {
        return [
            "name" => Rule::when(fn() => $this->category->name !== $this->name, 'required|unique:categories,name|max:255'),
            "description" => 'required|max:255',
        ];
    }

    public function render()
    {
        return view('livewire.modal.category.update');
    }
}
