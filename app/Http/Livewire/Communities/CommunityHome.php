<?php

namespace App\Http\Livewire\Communities;

use App\Models\Community;
use Livewire\Component;

class CommunityHome extends Component
{
    public Community $community;

    public function render()
    {
        return view('livewire.communities.community-home')
            ->layout('components.layout', ['title' => $this->community->name, 'community' => $this->community]);
    }
}
