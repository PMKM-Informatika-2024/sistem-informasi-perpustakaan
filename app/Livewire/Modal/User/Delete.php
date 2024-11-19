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

        $this->dispatch('close-modal');
        Session::flash('success', 'Berhasil menghapus member');

        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.user.delete');
    }
}
