<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use Livewire\Component;

class Header extends Component
{
    public Discussion $discussion;
    public int $replies = 0;
    public int $comments = 0;

    protected $listeners = [
        'replyAdded'
    ];

    public function mount(): void {
        $this->replyAdded();
    }

    public function render()
    {
        return view('livewire.discussion.header');
    }

    public function replyAdded(): void
    {
        $this->discussion->refresh();
        $this->replies = $this->discussion->replies()->count();
        $this->comments = $this->discussion->comments()->count();
    }
}
