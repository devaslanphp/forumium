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
        'replyAdded' => 'initData',
        'replyDeleted' => 'initData'
    ];

    public function mount(): void
    {
        $this->initData();
    }

    public function render()
    {
        return view('livewire.discussion.header');
    }

    public function initData(): void
    {
        $this->replies = $this->discussion->replies()->count();
        $this->comments = $this->discussion->comments()->count();
    }
}
