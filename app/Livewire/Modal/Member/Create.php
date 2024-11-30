<?php

namespace App\Livewire\Modal\Member;

use App\Models\Member;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public string $name;

    public function render()
    {
        return view('livewire.modal.member.create');
    }

    public function create()
    {
        $data = $this->validate();

        Member::create([
            ...$data,
            'password' => Hash::make(config('env.secret')),
        ]);

        Session::flash('success', 'Member berhasil ditambahkan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', Rule::unique('members', 'name')->whereNull('deleted_at')],
        ];
    }
}
