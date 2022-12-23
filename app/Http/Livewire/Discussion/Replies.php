<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use App\Models\Reply;
use Livewire\Component;

class Replies extends Component
{
    public Discussion $discussion;
    public $replies;
    public Reply|null $selectedReply = null;

    protected $listeners = [
        'replyAdded' => 'updateReplies',
        'replyUpdated' => 'updateReplies',
        'replyDeleted' => 'updateReplies'
    ];

    public function mount(): void
    {
        $this->replies = $this->discussion->replies()->get();
    }

    public function render()
    {
        return view('livewire.discussion.replies');
    }

    public function updateReplies(): void
    {
        $this->replies = $this->discussion->replies()->get();
        $this->selectedReply = null;
    }
}
