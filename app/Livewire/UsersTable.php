<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Role;
use App\Models\User;

class UsersTable extends Component
{
    use WithPagination;

    #[Url(as: "search", history: true)]
    public string $keyword = '';

    private function search(string $keyword)
    {
        return User::where("name", "LIKE", "%{$keyword}%")->whereRelation("role", "name", "!=", "admin")->paginate(6)->onEachSide(1)->withQueryString();
    }

    private function allExceptAdmin()
    {
        if (request()->has("role")) {
            return User::whereRelation("role", "name", "!=", "admin")->whereRelation("role", "name", request("role"))->paginate(6)->onEachSide(1)->withQueryString();
        }

        return User::whereRelation("role", "name", "!=", "admin")->paginate(6)->onEachSide(1)->withQueryString();
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
