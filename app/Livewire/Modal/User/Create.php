<?php

namespace App\Livewire\Modal\User;

use App\Models\Role;
use Livewire\Component;
use App\Services\UserService;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate(rule: 'required', message: 'Nama harus diisi')]
    #[Validate(rule: 'unique:users,name', message: 'Nama sudah ada')]
    public string $name;

    #[Validate(rule: 'required', message: 'Email harus diisi')]
    #[Validate(rule: 'unique:users,email', message: 'Email sudah ada')]
    #[Validate(rule: 'email:dns', message: 'Email tidak valid')]
    public string $email;

    #[Validate(rule: 'required', message: 'Nomor Telepon harus diisi')]
    #[Validate(rule: 'unique:users,phone_number', message: 'Nomor Telepon sudah ada')]
    #[Validate(rule: 'numeric', message: 'Nomor Telepon harus angka')]
    #[Validate(rule: 'phone:ID', message: 'Nomor Telepon tidak valid')]
    public string $phone_number;

    #[Validate(rule: 'required', message: 'Alamat harus diisi')]
    #[Validate(rule: 'string', message: 'Alamat harus berupa huruf')]
    #[Validate(rule: 'max:255', message: 'maksimal 255 karakter')]
    public string $address;

    #[Validate(rule: 'required', message: 'Password harus diisi')]
    #[Validate(rule: 'exists:roles,id', message: 'Role tidak valid')]
    public string $role_id = '';

    public function create()
    {
        $this->validate();

        UserService::create($this->all());

        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.user.create')->with([
            'roles' => Role::all()->reject(fn (Role $role) => $role->name === 'admin'),
        ]);
    }
}
