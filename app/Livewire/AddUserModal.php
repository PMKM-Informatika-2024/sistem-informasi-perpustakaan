<?php

namespace App\Livewire;

use App\Livewire\Forms\AddUserForm;
use App\Models\Role;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddUserModal extends Component
{
    public AddUserForm $form;

    public function save()
    {
        $data = $this->validate();

        UserService::store($data);
        Session::flash('success', 'User berhasil ditambahkan');

        return $this->redirectRoute("manage user");
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
