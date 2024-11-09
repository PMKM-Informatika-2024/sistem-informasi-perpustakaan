<?php

namespace App\Livewire\Modal\User;

use App\Models\User;
use Livewire\Component;
use App\Services\UserService;

class Delete extends Component
{
    public function delete(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();
        UserService::delete($user);

        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.user.delete');
    }
}
