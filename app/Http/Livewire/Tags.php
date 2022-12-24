<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $tags;

    public function mount(): void
    {
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('livewire.tags');
    }
}
