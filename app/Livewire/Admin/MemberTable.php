<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\Url;

class MemberTable extends Component
{
    #[Url(as: "nama")]
    public string $keyword = '';

    public function render()
    {
        return view('livewire.admin.member-table')->with([
            "roles" => Role::all()->reject(function (Role $role) {
                return $role->name === 'admin';
            }),
            "members" => User::where("name", "LIKE", "%{$this->keyword}%")->excludeAdmin()->latest()->get(),
        ]);
    }
}
