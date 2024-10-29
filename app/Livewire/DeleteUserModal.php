<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class DeleteUserModal extends Component
{
    public function delete(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $user->delete();
        Session::flash('success', 'User berhasil dihapus');

        $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.delete-user-modal');
    }
}
