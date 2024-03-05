<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logo extends Component
{
    public string $logo_url;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->logo_url = asset('img/logo-placeholder-image.png');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.logo');
    }
}
