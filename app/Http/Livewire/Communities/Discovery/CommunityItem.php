<?php

namespace App\Http\Livewire\Communities\Discovery;

use App\Models\Community;
use Livewire\Component;

class CommunityItem extends Component
{
    public Community $community;

    public function mount(Community $community)
    {
        $this->community = $community;
    }

    public function render()
    {
        return view('livewire.communities.discovery.community-item');
    }
}
