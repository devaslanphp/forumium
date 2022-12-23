<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Reply;
use Livewire\Component;

class ReplyDetails extends Component
{
    public Reply $reply;
    public int $likes = 0;
    public int $comments = 0;

    public function mount(): void
    {
        $this->initDetails();
    }

    public function render()
    {
        return view('livewire.discussion.reply-details');
    }

    private function initDetails(): void
    {
        $this->likes = 0;
        $this->comments = $this->reply->comments()->count();
    }
}
