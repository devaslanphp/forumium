<?php

namespace App\Http\Livewire\Community;

use App\Models\Community;
use Livewire\Component;

class CommunityPreviewPage extends Component
{
    public string $title;
    public Community $community;

    public function mount(Community $slug)
    {
        $this->community = $slug;
    }

    public function render()
    {
        return view('livewire.community.community-preview-page')
            ->layout('components.layout');
    }
}
