<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use Livewire\Component;

class Replies extends Component
{
    public Discussion $discussion;
    public $replies;

    protected $listeners = [
        'replyAdded'
    ];

    public function mount(): void
    {
        $this->replies = $this->discussion->replies()->get();
    }

    public function render()
    {
        return view('livewire.discussion.replies');
    }

    public function replyAdded(): void
    {
        $this->replies = $this->discussion->replies()->get();
    }
}
