<?php

namespace App\Livewire\Modal\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate(rule: 'required|string|unique:users,name')]
    public string $name;

    #[Validate(rule: 'required|string|unique:users,username')]
    public string $username;

    #[Validate(rule: 'required|string|unique:users,phone_number|phone:ID')]
    public string $phone_number;

    #[Validate(rule: 'required|exists:roles,id')]
    public string $role_id = '';

    public function render()
    {
        return view('livewire.modal.user.create')->with([
            "roles" => Role::all()->reject(fn(Role $role) => $role->name === "admin")
        ]);
    }

    public function create()
    {
        $data = $this->validate();

        User::create([
            ...$data,
            "password" => Hash::make(config("env.secret"))
        ]);

        $this->dispatch("close-modal");
        return $this->redirectRoute("manage user");
    }
}
