<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;
use Livewire\Attributes\Validate;

class AddUserModal extends Component
{
    #[Validate(rule: 'required', message: 'Nama harus diisi')]
    public string $name;

    #[Validate(rule: 'required|email:dns|unique:users,email')]
    public string $email;

    #[Validate(rule: 'required|numeric')]
    public string $phone_number;

    #[Validate(rule: 'required|string|max:255')]
    public string $address;

    #[Validate(rule: 'required|exists:roles,id')]
    public string $role_id = '';

    public function save()
    {
        $data = $this->validate();

        dd($data);
    }

    public function render()
    {
        return view('livewire.add-user-modal')->with([
            "roles" => Role::all()->reject(function ($role) {
                return $role->name === "admin";
            }),
        ]);
    }
}
