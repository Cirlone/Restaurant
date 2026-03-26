<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TwoFactorController extends Controller
{
    public function create()
    {
        return view('auth.two-factor-challenge');
    }

    public function store(Request $request)
    {
        $user = $this->getChallengingUser($request);

        if (!$user) {
            return redirect()->route('login');
        }

        // Check authentication code
        if ($request->filled('code')) {
            $code = str_replace(' ', '', $request->code);

            if ($this->verifyTwoFactorCode($user, $code)) {
                return $this->loginUser($request, $user);
            }

            return back()->withErrors(['code' => 'The provided two factor authentication code was invalid.']);
        }

        // Check recovery code
        if ($request->filled('recovery_code')) {
            if ($this->verifyRecoveryCode($user, $request->recovery_code)) {
                return $this->loginUser($request, $user);
            }

            return back()->withErrors(['recovery_code' => 'The provided two factor recovery code was invalid.']);
        }

        return back()->withErrors(['code' => 'Please enter a code.']);
    }

    protected function getChallengingUser(Request $request)
    {
        $userId = $request->session()->get('two_factor_user_id');

        if (!$userId) {
            return null;
        }

        return User::find($userId);
    }

    protected function verifyTwoFactorCode(User $user, string $code): bool
    {
        if (!$user->two_factor_secret) {
            return false;
        }

        try {
            $secret = decrypt($user->two_factor_secret);

            if (class_exists('\PragmaRX\Google2FA\Google2FA')) {
                $google2fa = new \PragmaRX\Google2FA\Google2FA();
                return $google2fa->verifyKey($secret, $code);
            }

            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    protected function verifyRecoveryCode(User $user, string $recoveryCode): bool
    {
        if (!$user->two_factor_recovery_codes) {
            return false;
        }

        try {
            $recoveryCodes = json_decode(decrypt($user->two_factor_recovery_codes), true);

            if (!in_array($recoveryCode, $recoveryCodes)) {
                return false;
            }

            // Remove used recovery code
            $recoveryCodes = array_diff($recoveryCodes, [$recoveryCode]);
            $user->two_factor_recovery_codes = encrypt(json_encode(array_values($recoveryCodes)));
            $user->save();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    protected function loginUser(Request $request, User $user)
    {
        $request->session()->forget('two_factor_user_id');

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }
}
