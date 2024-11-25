<?php

namespace App\Livewire\Modal\Member;

use App\Models\User;
use Livewire\Component;
use App\Models\Role as Model;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Role extends Component
{
    public ?User $user = null;

    #[On("role")]
    public function prepare(string $id, string $type)
    {
        $this->user = User::findOrFail($id);

        $this->dispatch("open-modal", modal: "role", type: $type);
    }


    public function promote()
    {
        $this->user->update(['role_id' => Model::where('name', 'karyawan')->first()->id]);

        Session::flash('success', 'Member berhasil dipromosikan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function demote()
    {
        $this->user->update(['role_id' => Model::where('name', 'member')->first()->id]);

        Session::flash('success', 'Member berhasil diturunkan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.member.role');
    }
}
