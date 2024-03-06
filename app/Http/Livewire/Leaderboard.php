<?php

namespace App\Http\Livewire;

use App\Models\Community;
use Livewire\Component;

class Leaderboard extends Component
{
    public Community $community;

    public function render()
    {
        return view('livewire.leaderboard.leaderboard')
            ->layout('components.layout', ['community' => $this->community, 'title' => $this->community->name]);
    }
}
