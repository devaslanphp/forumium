<?php

namespace App\View\Components\Profile;

use App\Core\FollowerConstants;
use Illuminate\View\Component;

class Stats extends Component
{
    public $user;
    public int $discussions;
    public int $replies;
    public int $comments;
    public int $likes;
    public int $followingDiscussions;
    public int $notFollowingDiscussions;
    public int $ignoringDiscussions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->discussions = $this->user->discussions()->count();
        $this->replies = $this->user->replies()->count();
        $this->comments = $this->user->comments()->count();
        $this->likes = $this->user->likes()->count();
        $this->followingDiscussions = $this->user->followings()->where('type', FollowerConstants::FOLLOWING->value)->count();
        $this->notFollowingDiscussions = $this->user->followings()->where('type', FollowerConstants::NOT_FOLLOWING->value)->count();
        $this->ignoringDiscussions = $this->user->followings()->where('type', FollowerConstants::IGNORING->value)->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile.stats');
    }
}
