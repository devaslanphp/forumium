<?php

namespace App\Http\Livewire\Communities\Discovery;

use App\Models\Community;
use Livewire\Component;
use Livewire\WithPagination;

class Discovery extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.communities.discovery.discovery', ['communities'=>Community::paginate(30)])
            ->layout('components.layout');
    }
}
