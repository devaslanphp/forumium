<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Livewire\Component;

class HomeContent extends Component
{
    public $discussions;

    public function mount(): void
    {
        $this->discussions = Discussion::all();
    }

    public function render()
    {
        return view('livewire.home-content');
    }
}
