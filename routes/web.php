<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')
    ->name('home');

Route::view('/registered', 'registered')
    ->name('verification.notice')
    ->middleware('just-registered');

Route::get('/email/verify/{id}/{hash}', EmailVerificationController::class)
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::get('/reset-password/{token}', function (string $token) {
    return view('password-reset', compact('token'));
})->middleware('guest')
    ->name('password.reset');

Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])
    ->name('socialite.redirect');

Route::get("callback/{provider}", [SocialiteController::class, 'callback'])
    ->name('socialite.callback');

Route::middleware(['auth', 'verified'])
    ->group(function () {

        Route::view('/profile', 'profile')
            ->name('profile');

        Route::view('/settings', 'settings')
            ->name('settings');

        Route::get('logout', LogoutController::class)
            ->name('logout');

    });
