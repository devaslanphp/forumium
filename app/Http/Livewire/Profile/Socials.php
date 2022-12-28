<?php

namespace App\Http\Livewire\Profile;

use App\Core\SocialConstants;
use App\Models\Social;
use Filament\Facades\Filament;
use Livewire\Component;

class Socials extends Component
{
    public $user;
    public $providers;

    public function mount()
    {
        $this->providers = SocialConstants::enabledCases();
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.profile.socials');
    }

    public function addProvider(string $provider): void
    {
        if (in_array($provider, $this->providers)) {
            session()->push('settings', $this->user->id);
            $this->redirect(route('socialite.redirect', $provider));
        }
    }

    public function deleteProvider(string $provider): void
    {
        $this->user->socials()->where('provider', $provider)->delete();
        Filament::notify('success', 'Social account ' . $provider . ' unlinked successfully.');
        $this->user->refresh();
    }
}
