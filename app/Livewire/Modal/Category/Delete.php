<?php

namespace App\Livewire\Modal\Category;

use Livewire\Component;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Session;

class Delete extends Component
{
    public function delete(string $name)
    {
        $category = Category::where('name', $name)->firstOrFail();

        $category->delete();

        $this->dispatch('close-modal');
        Session::flash("success", "Berhasil Menghapus Kategori");

        return $this->redirectRoute('manage category');
    }

    public function render()
    {
        return view('livewire.modal.category.delete');
    }
}
