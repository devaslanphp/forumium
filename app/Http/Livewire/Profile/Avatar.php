<?php

namespace App\Http\Livewire\Profile;

use Filament\Facades\Filament;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatar extends Component
{
    use WithFileUploads;

    public $user;
    public $picture;

    protected $listeners = [
        'doDeleteProfilePicture'
    ];

    public function render()
    {
        return view('livewire.profile.avatar');
    }

    public function updatedPicture(): void
    {
        $validator = Validator::make([
            'picture' => $this->picture,
        ], [
            'picture' => 'required|mimes:jpg,png,jpeg,svg,webp,gif|max:10240'
        ]);
        if ($validator->fails()) {
            Filament::notify('warning', $validator->messages()->get('picture')[0]);
        } else {
            $this->user->picture = str_replace('public/', '', $this->picture->store('public'));
            $this->user->save();
            Filament::notify('success', 'Your profile picture was successfully updated', true);
            $this->redirect(route('profile.index'));
        }
    }

    public function deleteProfilePicture(): void
    {
        Notification::make()
            ->warning()
            ->title('Delete confirmation')
            ->body('Are you sure you want to delete your profile picture?')
            ->actions([
                Action::make('confirm')
                    ->label('Confirm')
                    ->color('danger')
                    ->button()
                    ->close()
                    ->emit('doDeleteProfilePicture'),

                Action::make('cancel')
                    ->label('Cancel')
                    ->close()
            ])
            ->persistent()
            ->send();
    }

    public function doDeleteProfilePicture(): void
    {
        $this->user->picture = null;
        $this->user->save();
        Filament::notify('success', 'Your profile picture was successfully removed', true);
        $this->redirect(route('profile.index'));
    }
}
