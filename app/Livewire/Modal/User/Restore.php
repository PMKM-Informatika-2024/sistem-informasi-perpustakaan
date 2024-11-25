<?php

namespace App\Livewire\Modal\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class Restore extends Component
{
    public ?User $user = null;

    #[On("prepare restore user")]
    public function prepare(string $id)
    {
        $this->user = User::onlyTrashed()->findOrFail($id);

        $this->dispatch("open-modal", modal: "restore user");
    }

    public function render()
    {
        return view('livewire.modal.user.restore')->with([
            "user" => $this->user,
        ]);
    }

    public function restore()
    {
        $this->user->restore();

        Session::flash("success", "User berhasil dikembalikan");
        $this->dispatch("close-modal");
        return $this->redirectRoute("manage user");
    }
}
