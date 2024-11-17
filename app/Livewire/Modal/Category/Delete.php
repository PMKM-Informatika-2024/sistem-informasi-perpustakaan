<?php

namespace App\Livewire\Modal\Category;

use Livewire\Component;
use App\Models\Category;
use App\Services\CategoryService;

class Delete extends Component
{
    public function delete(string $name)
    {
        $category = Category::where('name', $name)->firstOrFail();

        CategoryService::delete($category);

        $this->dispatch('close-modal');

        return $this->redirectRoute('manage categories');
    }

    public function render()
    {
        return view('livewire.modal.category.delete');
    }
}
