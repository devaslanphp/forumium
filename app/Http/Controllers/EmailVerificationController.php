<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{

    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        return redirect()->route('home');
    }

}
