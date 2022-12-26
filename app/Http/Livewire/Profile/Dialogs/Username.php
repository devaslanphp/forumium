<?php

namespace App\Http\Livewire\Profile\Dialogs;

use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Phpsa\FilamentPasswordReveal\Password;

class Username extends Component implements HasForms
{
    use InteractsWithForms;

    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->form->fill([
            'name' => $this->user->name
        ]);
    }

    public function render()
    {
        return view('livewire.profile.dialogs.username');
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Full name')
                ->unique(table: User::class, column: 'email', ignorable: $this->user)
                ->required(),

            Password::make('password')
                ->label('Current password')
                ->required()
        ];
    }

    public function change(): void
    {
        $data = $this->form->getState();
        if (Hash::check($data['password'], $this->user->password)) {
            $this->user->name = $data['name'];
            $this->user->save();
            Filament::notify('success', 'Your full name was successfully changed.', true);
            $this->redirect(route('profile.settings'));
        } else {
            throw ValidationException::withMessages([
                'password' => __('validation.current_password'),
            ]);
        }
    }
}
