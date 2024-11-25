<?php

namespace App\Livewire\Karyawan\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryTable extends Component
{
    public function render()
    {
        return view('livewire.karyawan.category.category-table')->with([
            "categories" => Category::all()
        ]);
    }
}
