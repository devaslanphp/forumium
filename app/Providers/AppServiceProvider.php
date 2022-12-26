<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.scss');
            // Customize user menu
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Back to home')
                    ->url(route('home'))
                    ->icon('heroicon-s-home'),
                UserMenuItem::make()
                    ->label('Settings')
                    ->url(route('profile.settings'))
                    ->icon('heroicon-s-cog'),
            ]);
        });

        // Register tippy styles
        Filament::registerStyles([
            'https://unpkg.com/tippy.js@6/dist/tippy.css',
        ]);

        // Add custom meta (favicon)
        Filament::pushMeta([
            new HtmlString('<link rel="icon" type="image/x-icon" href="' . asset('favicon.svg') . '">'),
        ]);
    }
}
