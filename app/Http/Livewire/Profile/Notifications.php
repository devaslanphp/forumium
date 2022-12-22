<?php

namespace App\Http\Livewire\Profile;

use App\Models\Notification;
use App\Models\UserNotification;
use Filament\Facades\Filament;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Notifications extends Component implements HasForms
{
    use InteractsWithForms;

    public function mount(): void
    {
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.profile.notifications');
    }

    protected function getFormSchema(): array
    {
        $fields = [];
        $notifications = Notification::all();
        foreach ($notifications as $notification) {
            $fields[] = Grid::make()
                ->columns(4)
                ->schema([
                    Placeholder::make($notification->name)
                        ->columnSpan(2),

                    Toggle::make('notification_' . $notification->id . '_web')
                        ->label('Web'),

                    Toggle::make('notification_' . $notification->id . '_email')
                        ->label('Email'),
                ]);
        }
        return $fields;
    }

    public function perform(): void
    {
        $data = $this->form->getState();
        $user = auth()->user();
        foreach ($data as $key => $value) {
            $field = explode('_', $key);
            $id = $field[1];
            $column = 'via_' . $field[2];
            $notification = UserNotification::where('user_id', $user->id)
                ->where('notification_id', $id)
                ->first();
            if (!$notification) {
                $notification = new UserNotification();
                $notification->user_id = $user->id;
                $notification->notification_id = $id;
            }
            $notification->{$column} = $value;
            $notification->save();
        }
        $this->initForm();
        Filament::notify('success', 'Your notifications were successfully updated.');
    }

    private function initForm(): void
    {
        $data = [];
        foreach (auth()->user()->appNotifications as $notification) {
            $data['notification_' . $notification->id . '_web'] = $notification->pivot->via_web;
            $data['notification_' . $notification->id . '_email'] = $notification->pivot->via_email;
        }
        $this->form->fill($data);
    }
}
