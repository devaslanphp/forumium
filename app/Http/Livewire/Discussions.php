<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Livewire\Component;

class Discussions extends Component
{
    public $discussions;
    public $tag;

    public function mount(): void
    {
        $query = Discussion::query();
        $query->orderBy('created_at', 'desc');
        if ($this->tag) {
            $query->whereHas('tags', function ($query) {
                return $query->where('tags.id', $this->tag);
            });
        }
        $this->discussions = $query->get();
    }

    public function render()
    {
        return view('livewire.discussions');
    }
}
