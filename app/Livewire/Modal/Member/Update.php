<?php

namespace App\Livewire\Modal\Member;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class Update extends Component
{
    public ?User $user = null;

    public string $name;

    public string $username;

    public string $phone_number;

    #[On(('update'))]
    public function prepare(string $id)
    {
        $this->user = User::query()->findOrFail($id);

        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->phone_number = $this->user->phone_number;

        $this->dispatch('open-modal', modal: 'update user');
    }

    public function update()
    {
        $data = $this->validate();

        $this->user->update($data);

        Session::flash('success', 'Member berhasil diperbarui');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', Rule::unique('users', 'name')->ignore($this->user->id)],
            'username' => ['required', 'string', Rule::unique('users', 'username')->ignore($this->user->id)],
            'phone_number' => ['required', 'string', Rule::unique('users', 'phone_number')->ignore($this->user->id)],
        ];
    }

    public function render()
    {
        return view('livewire.modal.member.update');
    }
}
