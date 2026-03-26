<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')
            ->redirect();
    }

    public function callback()
    {
        $facebookUser = Socialite::driver('facebook')
            ->stateless() // VERY IMPORTANT
            ->user();

        $user = User::where('email', $facebookUser->email)->first();

        if ($user) {
            if (!$user->facebook_id) {
                $user->facebook_id = $facebookUser->id;
                $user->save();
            }
        } else {
            $user = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'password' => bcrypt(Str::random(16)),
                'email_verified_at' => now(),
            ]);
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}