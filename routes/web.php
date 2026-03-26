<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('index');
})->name('home');

// Guest routes (only accessible when not logged in)
Route::middleware('guest')->group(function () {
    // Login routes
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

    // Register routes
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // Password reset routes
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', [\App\Http\Controllers\Auth\NewPasswordController::class, 'store'])
        ->name('password.update');

    // Two Factor Challenge
    Route::get('/two-factor-challenge', [\App\Http\Controllers\Auth\TwoFactorController::class, 'create'])
        ->name('two-factor.login.form');
    Route::post('/two-factor-challenge', [\App\Http\Controllers\Auth\TwoFactorController::class, 'store'])
        ->name('two-factor.login');
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // E-commerce
    Route::get('/e-commerce', [EcommerceController::class, 'index'])->name('ecommerce');

    // Reports
    Route::get('/reports', [App\Http\Controllers\ReportsController::class, 'index'])->name('reports');

    // Checkout routes
    Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

    // User management (admin/manager only)
    Route::middleware(['admin_manager'])->prefix('users')->name('users.')->group(function () {
        Route::get('/', function () {
            return view('users');
        })->name('index');

        Route::patch('/{user}/role', function (App\Models\User $user) {
            request()->validate([
                'role' => ['required', Rule::in(config('roles'))],
            ]);

            $currentUser = auth()->user();
            $newRole = request('role');

            if ($currentUser->role === 'manager') {
                if (in_array($user->role, ['admin', 'manager'])) {
                    return back()->with('error', 'Managers cannot modify admin or manager users.');
                }

                if (in_array($newRole, ['admin', 'manager'])) {
                    return back()->with('error', 'Managers can only assign user role.');
                }
            }

            $user->update(['role' => $newRole]);
            return back()->with('success', 'User role updated!');
        })->name('update-role');

        Route::delete('/{user}', function ($id) {
            $user = App\Models\User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted!');
        })->name('destroy');

        Route::get('/create', function () {
            return view('createuser');
        })->name('create');

        Route::post('/', function () {
            request()->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'role' => ['required', Rule::in(config('roles'))],
            ]);

            $currentUser = auth()->user();
            $newRole = request('role');

            if ($currentUser->role === 'manager' && $newRole !== 'user') {
                return back()->with('error', 'Managers can only create regular users.')
                             ->withInput();
            }

            App\Models\User::create([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'name' => request('first_name') . ' ' . request('last_name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'role' => $newRole,
            ]);

            return redirect()->route('users.index')->with('success', 'User created!');
        })->name('store');

        Route::get('/{user}/edit', function ($id) {
            $user = App\Models\User::findOrFail($id);
            return view('edituser', ['user' => $user]);
        })->name('edit');

        Route::patch('/{user}', function ($id) {
            $user = App\Models\User::findOrFail($id);
            return redirect()->route('users.index')->with('success', 'User updated!');
        })->name('update-profile');
    });

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

// Logout for unverified users
Route::middleware(['auth'])->group(function () {
    Route::post('/logout-unverified', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout.unverified');
});

// OAuth Routes
Route::get('/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleController::class, 'callback'])->name('google.callback');
Route::get('/facebook/redirect', [FacebookController::class, 'redirect'])->name('facebook.redirect');
Route::get('/facebook/callback', [FacebookController::class, 'callback'])->name('facebook.callback');

// Menu routes
Route::get('/menu/item/{id}', [MenuController::class, 'show'])->name('menu.item');

// Static pages
Route::view('/Restaurant-Validation', 'Restaurant-Validation')->name('restaurant.validation');
Route::view('/Newsletter-Validation', 'Newsletter-Validation')->name('newsletter.validation');
Route::view('/cart', 'cart-page')->name('cart')->middleware(['auth', 'verified', 'client']);

// Terms and Privacy Policy
Route::view('/terms', 'terms')->name('terms.show');
Route::view('/privacy', 'policy')->name('policy.show');

// Test route (remove in production)
Route::get('/test-mail', function () {
    Mail::raw('Test email', function ($m) {
        $m->to('you@example.com')->subject('Hello from Laravel');
    });
    return 'Email sent!';
})->name('test.mail');

// Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [\App\Http\Controllers\Auth\EmailVerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Profile routes
Route::middleware('auth')->group(function () {
    // Confirm password
    Route::get('/confirm-password', function () {
        return view('auth.confirm-password');
    })->name('password.confirm');
    Route::post('/confirm-password', [\App\Http\Controllers\Auth\ConfirmablePasswordController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/profile/sessions/logout', [ProfileController::class, 'logoutOtherSessions'])->name('profile.sessions.logout');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Two Factor Authentication routes
    Route::post('/profile/two-factor/enable', [ProfileController::class, 'enableTwoFactor'])->name('two-factor.enable');
    Route::delete('/profile/two-factor/disable', [ProfileController::class, 'disableTwoFactor'])->name('two-factor.disable');

    // API Tokens Management (ONLY FOR ADMINS)
    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/api-tokens', [App\Http\Controllers\ApiTokenController::class, 'index'])->name('api-tokens.index');
        Route::post('/api-tokens', [App\Http\Controllers\ApiTokenController::class, 'store'])->name('api-tokens.store');
        Route::patch('/api-tokens/{token}', [App\Http\Controllers\ApiTokenController::class, 'update'])->name('api-tokens.update');
        Route::delete('/api-tokens/{token}', [App\Http\Controllers\ApiTokenController::class, 'destroy'])->name('api-tokens.destroy');
    });
});

Route::get('/categories', function () {
    return view('categories');
})->name('categories')->middleware('auth');
Route::get('/menu-items', function () {
    return view('menu-items');
})->name('menu-items')->middleware('auth');

Route::view('/order-address-details', 'order-address')->name('order.address');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');