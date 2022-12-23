<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use Livewire\Component;

class DiscussionDetails extends Component
{
    public Discussion $discussion;
    public int $likes = 0;
    public int $comments = 0;

    public function mount(): void
    {
        $this->initDetails();
    }

    public function render()
    {
        return view('livewire.discussion.discussion-details');
    }

    private function initDetails(): void
    {
        $this->likes = 0;
        $this->comments = $this->discussion->comments()->count();
    }
}
