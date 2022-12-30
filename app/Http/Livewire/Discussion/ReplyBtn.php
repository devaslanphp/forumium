<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use Livewire\Component;

class ReplyBtn extends Component
{
    public Discussion $discussion;

    protected $listeners = [
        'discussionEdited'
    ];

    public function render()
    {
        return view('livewire.discussion.reply-btn');
    }

    public function discussionEdited()
    {
        $this->discussion->refresh();
    }
}
