<?php

namespace App\Livewire\Modal\User;

use App\Models\User;
use Livewire\Component;
use App\Models\Role as Model;
use Illuminate\Support\Facades\Session;

class Role extends Component
{
    public function promote(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $user->update(['role_id' => Model::where('name', 'karyawan')->first()->id]);

        Session::flash('success', 'Member berhasil dipromosikan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function demote(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $user->update(['role_id' => Model::where('name', 'member')->first()->id]);

        Session::flash('success', 'Member berhasil diturunkan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.user.role');
    }
}
