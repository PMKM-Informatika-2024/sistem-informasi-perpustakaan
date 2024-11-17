<?php

namespace App\Livewire\Modal\User;

use App\Models\User;
use Livewire\Component;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class Update extends Component
{
    public ?User $user = null;

    public string $name;
    public string $email;
    public string $phone_number;
    public string $address;

    #[On("set-id")]
    public function prepareUser($id)
    {
        $this->user = User::findOrFail($id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone_number = $this->user->phone_number;
        $this->address = $this->user->address;

        $this->dispatch('open-modal', modal: 'update');
    }

    public function update()
    {
        $this->validate();
        UserService::update($this->user, $this->except('user'));

        $this->dispatch('close-modal');
        return $this->redirectRoute('manage user');
    }

    public function rules()
    {
        return [
            'name' => Rule::when(fn() => $this->user?->name !== $this->name, 'required|unique:users,name'),
            'email' => Rule::when(fn() => $this->user?->email !== $this->email, 'required|email:dns|unique:users,email'),
            'phone_number' => Rule::when(fn() => $this->user?->phone_number !== $this->phone_number, 'required|numeric|unique:users,phone_number|phone:ID'),
            'address' => 'required|string|max:255',
        ];
    }

    public function render()
    {
        return view('livewire.modal.user.update');
    }
}
