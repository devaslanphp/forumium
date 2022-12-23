<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use Livewire\Component;

class Replies extends Component
{
    public Discussion $discussion;

    protected $listeners = [
        'replyAdded'
    ];

    public function render()
    {
        return view('livewire.discussion.replies');
    }

    public function replyAdded(): void
    {
        $this->discussion->refresh();
    }
}
