<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlankLayout extends Component
{
    public string|null $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string|null $title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blank-layout');
    }
}
