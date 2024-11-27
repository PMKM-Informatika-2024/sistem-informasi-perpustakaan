<?php

namespace App\Livewire\Modal\Member;

use App\Models\Member;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Delete extends Component
{
    public ?Member $member = null;

    #[On("delete")]
    public function prepare(string $id)
    {
        $this->member = Member::findOrFail($id);

        $this->dispatch("open-modal", modal: "delete specific");
    }


    public function delete()
    {
        $this->member->delete();

        Session::flash('success', 'Member berhasil dihapus');
        $this->dispatch('close-modal');
        return $this->redirectRoute('manage user');
    }

    public function render()
    {
        return view('livewire.modal.member.delete');
    }
}
