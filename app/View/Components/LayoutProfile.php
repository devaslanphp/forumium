<?php

namespace App\View\Components;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\Component;

class LayoutProfile extends Component
{
    public string|null $title;
    public Authenticatable $user;
    public int $bestAnswers = 0;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, string|null $title = null)
    {
        $this->user = $user ?? auth()->user();
        $this->title = $title;
        $this->bestAnswers = $this->user->replies()->where('is_best', true)->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout-profile');
    }
}
