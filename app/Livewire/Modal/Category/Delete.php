<?php

namespace App\Livewire\Modal\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class Delete extends Component
{
    public ?Category $category = null;

    #[On('delete')]
    public function prepare(string $id)
    {
        $this->category = Category::findOrFail($id);

        $this->dispatch('open-modal', modal: 'delete category');
    }

    public function delete()
    {
        $this->category->delete();

        Session::flash('success', 'Berhasil menghapus kategori');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage category');
    }

    public function render()
    {
        return view('livewire.modal.category.delete');
    }
}
