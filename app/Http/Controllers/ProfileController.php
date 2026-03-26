<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    public function show()
    {
        $sessions = $this->getActiveSessions();
        return view('profile', compact('sessions'));
    }

    public function update(Request $request)
{
    $user = $request->user();

    $rules = [
        'name' => ['sometimes', 'string', 'max:255'],
        'email' => ['sometimes', 'email', Rule::unique('users')->ignore($user->id)],
    ];

    // Handle both file upload and AJAX cropped image
    if ($request->hasFile('photo')) {
        $rules['photo'] = ['image', 'max:5120'];
    }

    $request->validate($rules);

    // Handle photo upload
    if ($request->hasFile('photo')) {
        // Delete old photo
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        $file = $request->file('photo');
        $filename = time() . '_' . uniqid() . '.jpg';
        $path = 'profile-photos/' . $filename;

        // Process image
        $image = Image::read($file);
        $image->cover(300, 300); // Ensure square crop

        // Save
        Storage::disk('public')->put($path, $image->encode());
        $user->profile_photo_path = $path;
    }

    // Handle name/email update
       if ($request->has('first_name')) {
    $user->first_name = $request->first_name;
}
if ($request->has('last_name')) {
    $user->last_name = $request->last_name;
}
    if ($request->has('email')) {
        $user->email = $request->email;
    }

    // Handle photo removal
    if ($request->has('remove_photo') && $request->remove_photo == '1') {
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->profile_photo_path = null;
        }
    }

    $user->save();

    // For AJAX requests
    if ($request->ajax() || $request->wantsJson()) {
        return response()->json(['success' => true]);
    }

    return back()->with('success', 'Profile updated successfully!');
}

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function logoutOtherSessions(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        auth()->logoutOtherDevices($request->password);

        return back()->with('success', 'Other browser sessions logged out!');
    }

    public function enableTwoFactor(Request $request)
    {
        $user = $request->user();

        if (!$user->two_factor_secret) {
            $user->two_factor_secret = encrypt(\Illuminate\Support\Str::random(40));
            $user->save();
        }

        return back()->with('success', 'Two factor authentication enabled. Scan the QR code with Google Authenticator.');
    }

    public function disableTwoFactor(Request $request)
    {
        $user = $request->user();

        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes = null;
        $user->save();

        return back()->with('success', 'Two factor authentication disabled.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        auth()->logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }

    protected function getActiveSessions()
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        try {
            $sessions = DB::connection(config('session.connection', 'mysql'))
                ->table(config('session.table', 'sessions'))
                ->where('user_id', auth()->user()->getAuthIdentifier())
                ->orderBy('last_activity', 'desc')
                ->get()
                ->map(function ($session) {
                    return (object) [
                        'agent' => $this->createAgent($session),
                        'ip_address' => $session->ip_address,
                        'is_current_device' => $session->id === session()->getId(),
                        'last_active' => \Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
                    ];
                });

            return $sessions;
        } catch (\Exception $e) {
            return collect();
        }
    }

    protected function createAgent($session)
    {
        if (class_exists('\Jenssegers\Agent\Agent')) {
            $agent = new \Jenssegers\Agent\Agent();
            $agent->setUserAgent($session->user_agent ?? '');

            return new class($agent) {
                protected $agent;

                public function __construct($agent)
                {
                    $this->agent = $agent;
                }

                public function platform()
                {
                    return $this->agent->platform();
                }

                public function browser()
                {
                    return $this->agent->browser();
                }

                public function isDesktop()
                {
                    return $this->agent->isDesktop();
                }
            };
        }

        return new class($session) {
            protected $session;

            public function __construct($session)
            {
                $this->session = $session;
            }

            public function platform()
            {
                return 'Unknown';
            }

            public function browser()
            {
                return 'Unknown';
            }

            public function isDesktop()
            {
                return true;
            }
        };
    }
}