<?php

namespace App\Livewire\Modal\User;

use App\Models\Role as Model;
use App\Models\User;
use Livewire\Component;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;

class Role extends Component
{
    public function promote(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();
        $user->update(["role_id" => Model::all()->where('name', 'karyawan')->first()->id]);

        $this->dispatch('close-modal');
        Session::flash('success', 'Berhasil promote member');
        return $this->redirectRoute('manage user');
    }

    public function demote(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();
        $user->update(["role_id" => Model::all()->where('name', 'member')->first()->id]);

        $this->dispatch('close-modal');
        Session::flash('success', 'Berhasil demote member');
        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.user.role');
    }
}
