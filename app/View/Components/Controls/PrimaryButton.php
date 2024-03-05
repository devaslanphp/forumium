<?php

namespace App\View\Components\Controls;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrimaryButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $customClass = ''
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.controls.primary-button');
    }
}
