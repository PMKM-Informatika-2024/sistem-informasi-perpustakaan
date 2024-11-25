<?php

namespace App\Livewire\Modal\User;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\On;

class Destroy extends Component
{
    public ?User $user = null;

    #[On("prepare destroy user")]
    public function prepare(string $id)
    {
        $this->user = User::onlyTrashed()->findOrFail($id);

        $this->dispatch("open-modal", modal: "destroy user");
    }

    public function delete()
    {
        $this->user->forceDelete();

        Session::flash("success", "Member dihapus permanen");
        $this->dispatch("close-modal");
        return $this->redirectRoute("view trashed user");
    }

    public function render()
    {
        return view('livewire.modal.user.destroy');
    }
}
