<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use App\Models\Role;
use App\Models\User;

class UsersTable extends Component
{
    use WithPagination;

    #[Url(as: "search")]
    public string $keyword = '';

    private function search(string $keyword)
    {
        return User::exceptAdmin()->nameLike($keyword)->withPaginate();
    }

    private function allExceptAdmin()
    {
        if (request()->has("role")) {
            return User::exceptAdmin()->roleIs(request("role"))->latest()->withPaginate();
        }

        return User::exceptAdmin()->latest()->withPaginate();
    }

    public function render()
    {
        return view('livewire.users-table')->with([
            "roles" => Role::all()->reject(function ($role) {
                return $role->name === "admin";
            }),
            "users" => $this->keyword === '' ? $this->allExceptAdmin() : $this->search($this->keyword),
        ]);
    }

    public function paginationView()
    {
        return 'vendor.pagination.tailwind';
    }
}
