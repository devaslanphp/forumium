<?php

use App\Http\Livewire\Community\CommunityPreviewPage;
use App\Http\Livewire\Community\Components\CommunitySettings;
use App\Http\Livewire\Community\CreateCommunity;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/signup', CreateCommunity::class);

    Route::get('/{community:slug}', CommunityPreviewPage::class)->name('communities.community.preview');


    Route::group(
        ['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/communities/{community:slug}', CommunitySettings::class)->name('communities.community.settings');

    });

});
