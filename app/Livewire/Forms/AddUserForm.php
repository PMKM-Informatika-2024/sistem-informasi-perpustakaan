<?php

namespace App\Livewire\Forms;

use App\Services\UserService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddUserForm extends Form
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
}
