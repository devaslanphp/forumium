<?php

namespace App\Http\Livewire\Profile;

use Filament\Facades\Filament;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Details extends Component implements HasForms
{
    use InteractsWithForms;

    public $user;

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->form->fill([
            'bio' => $this->user->bio,
            'is_email_visible' => $this->user->is_email_visible
        ]);
    }

    public function render()
    {
        return view('livewire.profile.details');
    }

    protected function getFormSchema(): array
    {
        return [
            Textarea::make('bio')
                ->label('Bio')
                ->rows(4)
                ->placeholder('Type a bio to your profile...'),

            Toggle::make('is_email_visible')
                ->label('Make your email address visible on the forum')
        ];
    }

    public function perform(): void
    {
        $data = $this->form->getState();
        $this->user->bio = $data['bio'];
        $this->user->is_email_visible = $data['is_email_visible'];
        $this->user->save();
        $this->user->refresh();
        Filament::notify('success', 'Your notifications were successfully updated.');
    }
}
