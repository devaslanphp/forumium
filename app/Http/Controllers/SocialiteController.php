<?php

namespace App\Http\Controllers;

use App\Core\SocialConstants;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    protected $providers;

    public function __construct()
    {
        $this->providers = SocialConstants::enabledCases();
    }

    public function redirect(Request $request)
    {
        $provider = $request->provider;
        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function callback(Request $request)
    {
        $provider = $request->provider;
        if (in_array($provider, $this->providers)) {
            $data = Socialite::driver($request->provider)->user();
            $details = $data->user;
            $user = null;
            if (session()->has('settings')) {
                $user = User::where('id', session()->get('settings'))->first();
            }
            if (!$user) {
                $user = User::where('email', $details['email'])->first();
            }
            if (!$user) {
                $user = User::whereHas('socials', function ($query) use ($details, $provider) {
                    return $query->where('token', $details['id'])
                        ->where('provider', $provider);
                })->first();
            }
            if (!$user) {
                $user = new User();
                $user->email = $details['email'];
                $user->name = $details['name'];
                $user->password = bcrypt(uniqid());
                $user->email_verified_at = now();
                $user->save();
            } elseif (!$user->email_verified_at) {
                $user->email_verified_at = now();
                $user->save();
            }
            $social = Social::where('provider', $provider)
                ->where('token', $details['id'])
                ->first();
            if (!$social) {
                Social::create([
                    'user_id' => $user->id,
                    'provider' => $provider,
                    'token' => $details['id'],
                    'email' => $details['email'],
                    'name' => $details['name']
                ]);
            }
            if (session()->has('settings')) {
                session()->remove('settings');
                return redirect()->route('profile.settings');
            } else {
                Auth::login($user);
                return redirect()->route('home');
            }
        }
        abort(404);
    }

}
