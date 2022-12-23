<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use App\Models\Like;
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
        $this->likes = $this->discussion->likes()->count();
        $this->comments = $this->discussion->comments()->count();
    }

    public function toggleLike(): void
    {
        $like = Like::where('user_id', auth()->user()->id)->where('source_id', $this->discussion->id)->where('source_type', Discussion::class)->first();
        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'source_id' => $this->discussion->id,
                'source_type' => Discussion::class
            ]);
        }
        $this->discussion->refresh();
        $this->initDetails();
    }
}
