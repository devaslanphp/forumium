<?php

namespace App\Http\Livewire\Communities\Components;

use App\Models\Community;
use Livewire\Component;

class CommunityListItem extends Component
{
    public Community $community;

    public function mount($community){
        $this->community = $community;
    }

    public function render()
    {
        return view('livewire.communities.components.community-list-item', ['community'=>$this->community]);
    }
}
