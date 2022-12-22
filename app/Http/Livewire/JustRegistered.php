<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Component;

class JustRegistered extends Component
{
    public int $user;
    public User|null $userObj;

    public function mount()
    {
        $this->userObj = User::where('id', $this->user)->first();
    }

    public function render()
    {
        return view('livewire.just-registered');
    }

    public function resend()
    {
        $this->userObj->sendEmailVerificationNotification();
        Filament::notify('success', 'Verification link sent');
    }
}
