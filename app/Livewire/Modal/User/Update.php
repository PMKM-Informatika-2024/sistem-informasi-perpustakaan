<?php

namespace App\Livewire\Modal\User;

use App\Models\User;
use Livewire\Component;
use App\Services\UserService;
use Illuminate\Validation\Rule;

class Update extends Component
{
    public string $name;

    public string $email;

    public string $phone_number;

    public string $address;

    public function update()
    {
        $this->validate();

        $user = User::where('name', $this->name)->firstOrFail();
        UserService::update($user, $this->all());

        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => Rule::when(fn () => request()->components[0]['updates']['email'] !== $this->email, 'required|email:dns|unique:users,email'),
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:255',
        ];
    }

    public function render()
    {
        return view('livewire.modal.user.update');
    }
}
