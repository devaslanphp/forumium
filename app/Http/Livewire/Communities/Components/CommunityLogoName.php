<?php

namespace App\Http\Livewire\Communities\Components;

use App\Models\Community;
use Livewire\Component;

class CommunityLogoName extends Component
{
    public Community $community;
    public string $customClass = '';
    public bool $isLink = false;

    public string|null $logo = null;

    public function mount()
    {
        $this->logo = $this->community->logo ? "/storage/$this->community->logo" :"https://ui-avatars.com/api/?name=". urlencode ($this->community->name)."&background=random";
    }

    public function render()
    {
        return view('livewire.communities.components.community-logo-name');
    }
}
