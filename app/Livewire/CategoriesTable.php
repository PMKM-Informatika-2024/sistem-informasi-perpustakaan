<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class CategoriesTable extends Component
{
    use WithPagination;

    #[Url(as: 'nama')]
    public string $keyword = '';

    public function render()
    {
        return view('livewire.categories-table')->with([
            "categories" => Category::withTrashed()->where("name", "LIKE", "%{$this->keyword}%")->paginate(6)
        ]);
    }

    public function paginationView()
    {
        return "vendor.pagination.tailwind";
    }
}
