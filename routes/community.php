<?php

use App\Http\Livewire\Calendar;
use App\Http\Livewire\Classroom;
use App\Http\Livewire\Communities\CommunityHome;
use App\Http\Livewire\Communities\CommunityAbout;
use App\Http\Livewire\Communities\Components\CommunitySettings;
use App\Http\Livewire\Communities\CreateCommunity;
use App\Http\Livewire\Communities\Discovery\Discovery;
use App\Http\Livewire\Leaderboard;
use App\Http\Livewire\Member;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/signup', CreateCommunity::class)->name('communities.community.create');

    Route::group(
        ['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/communities/{community:slug}', CommunitySettings::class)->name('communities.community.settings');
    });
});

Route::get('/discovery', Discovery::class)->name('communities.discovery');

Route::prefix('/{community:slug}')->group(function () {
    Route::get('/',             CommunityHome::class)->name('communities.community.home');
    Route::get('/about',        CommunityAbout::class)->name('communities.community.preview');

    Route::get('/classroom',    Classroom::class)->name('classroom');
    Route::get('/calendar',     Calendar::class)->name('calendar');

    Route::get('/member',       Member::class)->name('member');
    Route::get('/leaderboard',  Leaderboard::class)->name('leaderboard');
});
