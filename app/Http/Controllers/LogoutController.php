<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{

    public function __invoke(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

}
