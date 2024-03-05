<?php

namespace App\Http\Livewire\Communities\Components;

use App\Models\Community;
use Livewire\Component;

class CommunityLogoName extends Component
{
    public Community $community;
    public string $customClass;
    public bool $isLink = false;


    public function render()
    {
        return view('livewire.communities.components.community-logo-name');
    }
}
