<?php

use App\Http\Livewire\Communities\CommunityPreviewPage;
use App\Http\Livewire\Communities\Components\CommunitySettings;
use App\Http\Livewire\Communities\CreateCommunity;
use App\Http\Livewire\Communities\Discovery\Discovery;
use Illuminate\Support\Facades\Route;


Route::get('/discovery', Discovery::class)->name('communities.discovery');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/signup', CreateCommunity::class)->name('communities.community.create');

    Route::get('/{community:slug}', CommunityPreviewPage::class)->name('communities.community.preview');

    Route::group(
        ['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/communities/{community:slug}', CommunitySettings::class)->name('communities.community.settings');
    });
});


