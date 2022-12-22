<?php

namespace App\Http\Livewire\Layout\Dialogs;

use App\Models\User;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use Phpsa\FilamentPasswordReveal\Password;

class Register extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRateLimiting;

    public function mount()
    {
        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.layout.dialogs.register');
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Full name')
                ->required(),

            TextInput::make('email')
                ->label('Email address')
                ->email()
                ->unique(table: User::class, column: 'email')
                ->required(),

            Password::make('password')
                ->label('Password')
                ->confirmed()
                ->required(),

            Password::make('password_confirmation')
                ->label('Password confirmation')
                ->required(),
        ];
    }

    public function register(): void
    {
        $data = $this->form->getState();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        event(new Registered($user));
        auth()->login($user);
        session()->flash('registered', $user->id);
        $this->redirect(route('verification.notice'));
    }
}
