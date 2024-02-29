<?php

use App\Http\Livewire\Community\CommunityPreviewPage;
use App\Http\Livewire\Community\CreateCommunity;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/signup', CreateCommunity::class);
    Route::get('/{slug}', CommunityPreviewPage::class)->name('communities.community.preview');
});
