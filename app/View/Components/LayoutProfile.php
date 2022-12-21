<?php

namespace App\View\Components;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\Component;

class LayoutProfile extends Component
{
    public string|null $title;
    public Authenticatable $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string|null $title = null)
    {
        $this->user = auth()->user();
        $this->title = $title;
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
