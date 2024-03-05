<?php

namespace App\Http\Livewire\Communities\Components;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CommunityList extends Component
{
    public Collection $communities;

    public function mount()
    {
        $this->communities = auth()->user()->communities;
    }

    public function render()
    {
        return view('livewire.communities.components.community-list');
    }
}
