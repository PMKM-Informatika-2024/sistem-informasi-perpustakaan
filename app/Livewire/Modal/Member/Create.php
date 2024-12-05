<?php

namespace App\Livewire\Modal\Member;

use App\Models\Member;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    public string $name;

    public string $phone_number;

    public function render()
    {
        return view('livewire.modal.member.create');
    }

    public function create()
    {
        $data = $this->validate();

        Member::create($data);

        Session::flash('success', 'Member berhasil ditambahkan');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', Rule::unique('members', 'name')->whereNull('deleted_at')],
            'phone_number' => ['required', 'phone:ID', Rule::unique('members', 'phone_number')->whereNull('deleted_at')],
        ];
    }

    public function messages()
    {
        return [
            'phone' => 'The :attribute field must be a valid number',
        ];
    }
}
