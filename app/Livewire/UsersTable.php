<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    #[Url(as: 'nama')]
    public string $keyword = '';

    public function render()
    {
        return view('livewire.users-table')->with([
            'roles' => Role::all()->reject(fn (Role $role) => $role->name === 'admin'),
            'users' => User::withTrashed()->where('name', 'LIKE', "%{$this->keyword}%")->latest()->excludeAdmin()->withPaginate(),
        ]);
    }

    public function paginationView()
    {
        return 'vendor.pagination.tailwind';
    }
}
