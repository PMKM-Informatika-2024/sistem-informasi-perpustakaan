<?php

namespace App\Livewire\Modal\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Delete extends Component
{
    public ?Category $category = null;

    public string $name;

    #[On('prepare for delete')]
    public function prepare(string $id)
    {
        $this->category = Category::findorFail($id);

        $this->name = $this->category->name;

        $this->dispatch("open-modal", modal: 'delete category');
    }

    public function delete()
    {
        $this->category->delete();

        Session::flash("success", "Kategori berhasil dihapus");
        $this->dispatch('close-modal');
        return $this->redirectRoute('manage category');
    }

    public function render()
    {
        return view('livewire.modal.category.delete');
    }
}
