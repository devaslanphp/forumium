<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;

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

Route::view('/', 'home')->name('home');

Route::middleware(['auth'])
    ->group(function () {
        Route::view('/profile', 'profile')->name('profile');
        Route::view('/settings', 'settings')->name('settings');
        Route::get('logout', LogoutController::class)->name('logout');
    });
