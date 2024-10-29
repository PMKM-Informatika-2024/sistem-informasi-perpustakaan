<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DemoteUserModal extends Component
{
    public function demote(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        UserService::demote($user);
        Session::flash('success', 'User berhasil diturunkan');

        $this->redirectRoute("manage user");
    }

    public function render()
    {
        return view('livewire.demote-user-modal');
    }
}
