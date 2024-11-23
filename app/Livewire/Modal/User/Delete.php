<?php

namespace App\Livewire\Modal\User;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Delete extends Component
{
    public function delete(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $user->delete();

        Session::flash('success', 'Member berhasil dihapus');
        $this->dispatch('close-modal');
        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.user.delete');
    }
}