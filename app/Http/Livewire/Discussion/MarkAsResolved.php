<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use Filament\Facades\Filament;
use Livewire\Component;

class MarkAsResolved extends Component
{
    public Discussion $discussion;

    public function render()
    {
        return view('livewire.discussion.mark-as-resolved');
    }

    public function toggleResolvedFlag(): void
    {
        $this->discussion->is_resolved = !$this->discussion->is_resolved;
        $this->discussion->save();
        Filament::notify(
            'success',
            match ($this->discussion->is_resolved) {
                true => 'Discussion marked as resolved.',
                false => 'Discussion reopened.'
            }
        );
        $this->emit('resolvedFlagUpdated');
    }
}
