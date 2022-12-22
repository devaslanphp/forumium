<?php

namespace App\Http\Livewire;

use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password as PasswordFacade;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Phpsa\FilamentPasswordReveal\Password;

class ForgotPassword extends Component implements HasForms
{
    use InteractsWithForms;

    public string $token;

    public function mount()
    {
        $this->form->fill([
            'email' => request()->get('email')
        ]);
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email address')
                ->email()
                ->required(),

            Password::make('password')
                ->label('New password')
                ->required()
                ->confirmed(),

            Password::make('password_confirmation')
                ->label('Password confirmation')
                ->required()
        ];
    }

    public function change(): void
    {
        $data = $this->form->getState();
        $status = PasswordFacade::reset(
            [
                'email' => $data['email'],
                'password' => $data['password'],
                'password_confirmation' => $data['password_confirmation'],
                'token' => $this->token
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                Auth::login($user);
                event(new PasswordReset($user));
            }
        );
        if ($status === PasswordFacade::PASSWORD_RESET) {
            Filament::notify('success', __($status), true);
            $this->redirect(route('home'));
        } else {
            throw ValidationException::withMessages([
                'email' => __($status),
            ]);
        }
    }
}
