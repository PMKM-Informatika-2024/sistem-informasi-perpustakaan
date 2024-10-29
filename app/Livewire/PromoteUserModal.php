<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PromoteUserModal extends Component
{
    public function promote(string $name)
    {
        $user = User::where("name", $name)->firstOrFail();

        UserService::promote($user);
        Session::flash("success", "User berhasil dipromosikan");

        $this->redirectRoute("manage user");
    }

    public function render()
    {
        return view('livewire.promote-user-modal');
    }
}
