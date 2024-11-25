<?php

namespace App\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;

class RestoreTable extends Component
{
    #[Url(as: "nama")]
    public string $keyword = '';

    public function render()
    {
        return view('livewire.admin.restore-table')->with([
            "roles" => Role::all()->reject(fn(Role $role) => $role->name === "admin"),
            "members" => User::onlyTrashed()->where("name", "LIKE", "%{$this->keyword}%")->excludeAdmin()->latest()->get()
        ]);
    }
}
