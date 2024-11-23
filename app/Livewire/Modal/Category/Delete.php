<?php

namespace App\Livewire\Modal\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Delete extends Component
{
    public function delete(string $name)
    {
        $category = Category::where('name', $name)->firstOrFail();

        $category->delete();

        Session::flash("success", "Kategori berhasil dihapus");
        $this->dispatch('close-modal');
        return $this->redirectRoute('manage category');
    }

    public function render()
    {
        return view('livewire.modal.category.delete');
    }
}
