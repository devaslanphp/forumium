<?php

namespace App\Http\Livewire\Communities\Components;

use App\Models\Community;
use Livewire\Component;

class CommunityInfo extends Component
{
    public Community $community;

    public function render()
    {
        return view('livewire.communities.components.community-info');
    }
}
