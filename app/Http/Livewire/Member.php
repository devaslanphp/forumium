<?php

namespace App\Http\Livewire;

use App\Models\Community;
use Livewire\Component;

class Member extends Component
{
    public Community $community;

    public function render()
    {
        return view('livewire.member.member')
            ->layout('components.layout', ['community' => $this->community, 'title' => $this->community->name]);
    }
}
