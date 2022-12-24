<?php

namespace App\Http\Livewire\Discussion;

use App\Core\FollowerConstants;
use App\Models\Discussion;
use App\Models\Follower;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Component;

class Follow extends Component
{
    public Discussion $discussion;
    public string|null $type = null;
    public User|null $follower = null;
    public string $bgClass = 'bg-slate-400 hover:bg-slate-500';

    public function mount(): void
    {
        $this->initFollower();
    }

    public function render()
    {
        return view('livewire.discussion.follow');
    }

    public function toggle(string $type): void
    {
        $follower = Follower::where('user_id', auth()->user()->id)->where('discussion_id', $this->discussion->id)->first();
        if (!$follower) {
            $follower = new Follower();
            $follower->user_id = auth()->user()->id;
            $follower->discussion_id = $this->discussion->id;
        }
        $follower->type = $type;
        $follower->save();
        $this->initFollower();
        Filament::notify('success', 'Follow status successfully upated.');
    }

    private function initFollower(): void
    {
        if (auth()->check()) {
            $this->follower = $this->discussion->followers()->where('user_id', auth()->user()->id)->first();
        } else {
            $this->follower = null;
        }
        $this->type = $this->follower?->pivot?->type ?? FollowerConstants::NONE->value;
        $this->bgClass = match ($this->type) {
            FollowerConstants::FOLLOWING->value => 'bg-green-400 hover:bg-green-500',
            FollowerConstants::NOT_FOLLOWING->value => 'bg-orange-400 hover:bg-range-500',
            FollowerConstants::IGNORING->value => 'bg-red-400 hover:bg-g-red-500',
            default => 'bg-slate-400 hover:bg-slate-500',
        };
    }
}
