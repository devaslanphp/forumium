<?php

namespace App\Http\Livewire\Layout;

use Livewire\Component;

class Notifications extends Component
{
    public int $unreadNotificationsCount = 0;

    public function render()
    {
        $this->unreadNotificationsCount = auth()->user()?->unreadNotifications()?->count() ?? 0;
        return view('livewire.layout.notifications');
    }

    public function openNotifications()
    {
        $this->dispatchBrowserEvent('open-modal', ['id' => 'database-notifications']);
        $this->emit('notificationsSent');
    }
}
