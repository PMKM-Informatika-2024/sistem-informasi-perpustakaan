<?php

namespace App\Livewire\Modal\Member;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Delete extends Component
{
    public ?User $user = null;

    #[On("delete")]
    public function prepare(string $id)
    {
        $this->user = User::findOrFail($id);

        $this->dispatch("open-modal", modal: "delete specific");
    }


    public function delete()
    {
        $this->user->delete();

        Session::flash('success', 'Member berhasil dihapus');
        $this->dispatch('close-modal');
        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.member.delete');
    }
}
