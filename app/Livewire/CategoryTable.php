<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryTable extends Component
{
    public function render()
    {
        return view('livewire.category-table')->with([
            'categories' => Category::all(),
        ]);
    }
}
