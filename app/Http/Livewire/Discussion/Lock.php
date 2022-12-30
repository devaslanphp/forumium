<?php

namespace App\Http\Livewire\Discussion;

use App\Core\NotificationConstants;
use App\Jobs\DispatchNotificationsJob;
use App\Models\Discussion;
use Filament\Facades\Filament;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Livewire\Component;

class Lock extends Component
{
    public Discussion $discussion;

    protected $listeners = [
        'doToggleLockedFlag'
    ];

    public function render()
    {
        return view('livewire.discussion.lock');
    }

    public function toggleLockedFlag(): void
    {
        Notification::make()
            ->warning()
            ->title(fn() => $this->discussion->is_locked ? 'Unlock confirmation' : 'Lock confirmation')
            ->body('Are you sure you want to change the locked flag for this discussion?')
            ->actions([
                Action::make('confirm')
                    ->label('Confirm')
                    ->color('danger')
                    ->button()
                    ->close()
                    ->emit('doToggleLockedFlag'),

                Action::make('cancel')
                    ->label('Cancel')
                    ->close()
            ])
            ->persistent()
            ->send();
    }

    public function doToggleLockedFlag(): void
    {
        $this->discussion->is_locked = !$this->discussion->is_locked;
        $this->discussion->save();
        Filament::notify('success', 'The discussion is now ' . ($this->discussion->is_locked ? 'locked' : 'unlocked'), true);
        if ($this->discussion->is_locked) {
            $type = NotificationConstants::DISCUSSION_LOCKED->value;
        } else {
            $type = NotificationConstants::DISCUSSION_UNLOCKED->value;
        }
        dispatch(new DispatchNotificationsJob(auth()->user(), $type, $this->discussion));
        $this->redirect(route('discussion', ['discussion' => $this->discussion, 'slug' => Str::slug($this->discussion->name)]));
    }
}
