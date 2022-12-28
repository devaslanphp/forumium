<?php

namespace App\View\Components\Profile;

use Illuminate\View\Component;

class Stats extends Component
{
    public $user;
    public int $discussions;
    public int $replies;
    public int $comments;
    public int $likes;

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
