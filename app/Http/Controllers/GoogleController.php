<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()

    {
        return Socialite::driver('google')->redirect();
    }

public function callback()
{
    try {
        $googleUser = Socialite::driver('google')->stateless()->user();
    
        // Check if user exists by email
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            if (!$user->google_id) {
                $user->google_id = $googleUser->id;
                $user->save();
            }
        } else {
            // Try multiple possible field names for first/last name
            $firstName = null;
            $lastName = null;
            
            // Check raw user array (most detailed)
            if (isset($googleUser->user)) {
                $userData = $googleUser->user;
                $firstName = $userData['given_name'] ?? null;
                $lastName = $userData['family_name'] ?? null;
            }
            
            // If not found, try to get from name
            if (!$firstName && $googleUser->name) {
                $nameParts = explode(' ', $googleUser->name, 2);
                $firstName = $nameParts[0] ?? '';
                $lastName = $nameParts[1] ?? '';
            }
            
            // Fallback to email username if still no name
            if (!$firstName) {
                $emailParts = explode('@', $googleUser->email);
                $firstName = $emailParts[0] ?? 'User';
                $lastName = '';
            }

            $user = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => bcrypt(Str::random(16)),
                'email_verified_at' => now(),
            ]);
        }
    
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Google login error: ' . $e->getMessage());
        return redirect('/login')->with('error', 'Google login failed. Please try again.');
    }

    Auth::login($user);
    return redirect('/dashboard');
}
}