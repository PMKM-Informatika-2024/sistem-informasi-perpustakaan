<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;
use Livewire\Attributes\Url;

class MemberTable extends Component
{
    #[Url(as: 'nama')]
    public string $keyword = '';

    public function render()
    {
        return view('livewire.member-table')->with([
            'members' => Member::query()->where('name', "LIKE", "%{$this->keyword}%")->latest()->get()
        ]);
    }
}
