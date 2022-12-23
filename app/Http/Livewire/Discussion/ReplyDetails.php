<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use App\Models\Like;
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
        $this->likes = $this->reply->likes()->count();
        $this->comments = $this->reply->comments()->count();
    }

    public function toggleLike(): void
    {
        $like = Like::where('user_id', auth()->user()->id)->where('source_id', $this->reply->id)->where('source_type', Reply::class)->first();
        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'source_id' => $this->reply->id,
                'source_type' => Reply::class
            ]);
        }
        $this->reply->refresh();
        $this->initDetails();
    }
}
