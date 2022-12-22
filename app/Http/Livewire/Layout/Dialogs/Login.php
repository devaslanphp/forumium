<?php

namespace App\Http\Livewire\Layout\Dialogs;

use App\Models\User;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Password as PasswordFacade;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Phpsa\FilamentPasswordReveal\Password;

class Login extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRateLimiting;

    public bool $forgotPassword = false;

    public function mount()
    {
        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.layout.dialogs.login');
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email address')
                ->email()
                ->required(),

            Password::make('password')
                ->label('Password')
                ->visible(fn() => !$this->forgotPassword)
                ->required(),

            Checkbox::make('remember')
                ->label('Remember me')
                ->visible(fn() => !$this->forgotPassword),
        ];
    }

    public function perform(): void
    {
        if ($this->forgotPassword) {
            $this->sendForgotPasswordEmail();
        } else {
            $this->login();
        }
    }

    public function toggleForgotPassword(): void
    {
        $this->forgotPassword = !$this->forgotPassword;
    }

    private function login(): void
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'email' => __('filament::login.messages.throttled', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]),
            ]);
        }
        $data = $this->form->getState();

        if (!Filament::auth()->attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ], $data['remember'])) {
            throw ValidationException::withMessages([
                'email' => __('filament::login.messages.failed'),
            ]);
        }

        session()->regenerate();

        if (auth()->user()->hasVerifiedEmail()) {
            $this->redirect(route('home'));
        } else {
            auth()->user()->sendEmailVerificationNotification();
            session()->flash('registered', auth()->user()->id);
            $this->redirect(route('verification.notice'));
        }
    }

    private function sendForgotPasswordEmail(): void
    {
        $data = $this->form->getState();
        if (!User::where('email', $data['email'])->count()) {
            throw ValidationException::withMessages([
                'email' => __('validation.exists', ['attribute' => 'email']),
            ]);
        }
        $status = PasswordFacade::sendResetLink([
            'email' => $data['email']
        ]);
        if ($status === PasswordFacade::RESET_LINK_SENT) {
            Filament::notify('success', __($status));
            $this->toggleForgotPassword();
            $this->form->fill();
        } else {
            Filament::notify('danger', __($status));
        }
    }
}
