<?php

namespace App\Livewire\Modal\Category;

use App\Models\Category;
use App\Services\CategoryService;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate('required', message: 'Harus Diisi')]
    #[Validate('unique:categories,name', message: 'Kategori Sudah Ada')]
    #[Validate('max:255', message: 'Maksimal 255 Karakter')]
    public string $name;

    #[Validate('required', message: 'Harus Diisi')]
    #[Validate('max:255', message: 'Maksimal 255 Karakter')]
    public string $description;

    public function create()
    {
        $this->validate();

        CategoryService::create($this->all());

        $this->dispatch('close-modal');
        return $this->redirectRoute('manage categories');
    }

    public function render()
    {
        return view('livewire.modal.category.create');
    }
}
