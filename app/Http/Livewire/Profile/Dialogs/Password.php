<?php

namespace App\Http\Livewire\Profile\Dialogs;

use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Phpsa\FilamentPasswordReveal\Password as PasswordInput;

class Password extends Component implements HasForms
{
    use InteractsWithForms;

    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.profile.dialogs.password');
    }

    protected function getFormSchema(): array
    {
        return [
            PasswordInput::make('current_password')
                ->label('Current password')
                ->required(),

            PasswordInput::make('password')
                ->label('New password')
                ->confirmed()
                ->required(),

            PasswordInput::make('password_confirmation')
                ->label('Password confirmation')
                ->required(),
        ];
    }

    public function change(): void
    {
        $data = $this->form->getState();
        if (Hash::check($data['current_password'], $this->user->password)) {
            $this->user->password = bcrypt($data['password']);
            $this->user->save();
            Filament::notify('success', 'Your password was successfully changed.', true);
            $this->redirect(route('profile.settings'));
        } else {
            throw ValidationException::withMessages([
                'current_password' => __('validation.current_password'),
            ]);
        }
    }
}
