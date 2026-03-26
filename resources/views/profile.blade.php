<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Profile - Restaurant</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
</head>
<body class="body-profile">
    <nav class="nav-dashboard" id="nav-profile">
        <div class="poza-logo-dashboard">
            <a href="/"><img src="{{ asset('imagini/Logo-Restaurant.svg') }}" alt="poza logo"></a>
        </div>
        <div class="nav-container">
            <ul class="nav-items">
                <li><a class="nav-element" href="/">HOME</a></li>
                <li><a class="nav-element" href="{{ url('/') }}#about">ABOUT US</a></li>
                <li><a class="nav-element" href="{{ url('/') }}#menu">MENU</a></li>
                <li><a class="nav-element" href="{{ url('/') }}#contact">CONTACT</a></li>
                <li><a class="nav-element" href="#">BLOG</a></li>
                <li><a class="nav-element" href="#">DELIVERY</a></li>
            </ul>
            <div class="order-container-dashboard">
                <input class="input-nav2" type="text" placeholder="search">
                <div class="logout-dropdown">
                    <div class="user-log">
                        @if(auth()->user()->profile_photo_path)
                            <img class="user" src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}?v={{ time() }}" alt="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}">
                        @else
                            <div class="default-avatar">
                                {{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}
                            </div>
                        @endif
                        <img class="arrow" src="{{ asset('imagini/Vector.svg') }}" alt="arrow">
                    </div>
                    <ul class="dropdown-options">
                        <li><span class="user-name">👤 Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span></li>
                        @if(auth()->user()->isAdmin())
                            <li><a href="{{ route('api-tokens.index') }}" class="dropdown-link">API Tokens</a></li>
                        @endif
                        <li><a href="{{ route('dashboard') }}" class="dropdown-link">Dashboard</a></li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="logout-button">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <img class="hamburger" id="hamburger-dashboard" src="{{ asset('imagini/Hamburgermenu.svg') }}" alt="poza hamburger">
                <img class="close" id="close-dashboard" src="{{ asset('imagini/hamburger-x.svg') }}" alt="poza x">
            </div>
        </div>
    </nav>

    <section class="profile-page">
        <div class="profile-container">

            <h1 class="profile-title">My Profile</h1>

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- ERROR MESSAGE -->
            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

                <!-- ==================== SECTION 1: PROFILE INFORMATION ==================== -->
            <div class="profile-section">
                <h2 class="profile-section-title">Profile Information</h2>
                <p class="profile-section-desc">Update your account's profile information and email address.</p>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="profile-form" data-profile-update-route="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <!-- Profile Photo -->
                <div class="profile-photo-section">
                    <label class="profile-label">Profile Photo</label>
                    <div class="profile-photo-wrapper">
                        <div class="profile-photo-circle">
                            @if(auth()->user()->profile_photo_path)
                                <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}?v={{ time() }}"
                                    alt="Profile"
                                    class="profile-photo-img">
                            @else
                                <div class="default-avatar" id="default-avatar-large">
                                    {{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <div class="profile-photo-actions">
                            <input 
                                type="file" 
                                name="photo" 
                                id="photoInput" 
                                accept="image/*" 
                                class="profile-photo-input"
                            >

                            <label for="photoInput" class="btn-upload-photo">
                                Upload Photo
                            </label>

                            @error('photo')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            @if(auth()->user()->profile_photo_path)
                                <button type="submit" name="remove_photo" value="1" class="btn-remove-photo">
                                    Remove Photo
                                </button>
                            @endif
                        </div>
                    </div>
                    </div>

                <!-- Cropper Modal -->
                <div id="cropModal" class="modal">
                    <div class="modal-content">
                        <h3 class="modal-title">Crop Your Photo</h3>
                        <p class="modal-text">Drag to adjust how your photo will appear</p>

                        <div class="cropImage-modal">
                            <img id="cropImage" src="">
                        </div>

                        <div class="cropImage-buttons">
                            <button type="button" onclick="closeCropModal()" class="btn-modal-cancel">Cancel</button>
                            <button type="button" onclick="applyCrop()" class="btn-modal-confirm">Apply Crop</button>
                        </div>
                    </div>
                </div>

                <!-- Hidden form to submit cropped image -->


                    <!-- Name -->
                    <div class="profile-field">
                        <label for="name" class="profile-label">First Name</label>
                        <input type="text" id="name" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" required class="profile-input">
                        @error('name')<div class="error-message">{{ $message }}</div>@enderror
                    </div>
                    <div class="profile-field">
                        <label for="name" class="profile-label">Last Name</label>
                        <input type="text" id="name" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" required class="profile-input">
                        @error('name')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <!-- Email -->
                    <div class="profile-field">
                        <label for="email" class="profile-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required class="profile-input">
                        @error('email')<div class="error-message">{{ $message }}</div>@enderror

                        @if(!auth()->user()->hasVerifiedEmail())
                            <div class="email-unverified">
                                <p class="unverified-text">Your email is unverified.</p>
                                <form method="POST" action="{{ route('verification.send') }}" class="inline-form">
                                    @csrf
                                    <button type="submit" class="btn-resend">Resend Verification</button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <div class="profile-actions">
                        <button type="submit" class="btn-save">Save Changes</button>
                    </div>
                </form>
                <form id="cropForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="cropped_image" id="croppedImage">
                </form>

                </div>

                <!-- ==================== SECTION 2: UPDATE PASSWORD ==================== -->
                <div class="profile-section">
                <h2 class="profile-section-title">Update Password</h2>
                <p class="profile-section-desc">Ensure your account is using a long, random password to stay secure.</p>

                <form method="POST" action="{{ route('profile.password.update') }}" class="profile-form">
                    @csrf
                    @method('PATCH')

                    <!-- Current Password -->
                    <div class="profile-field password-field">
                        <label for="current_password" class="profile-label">Current Password</label>
                        <div class="profile-password-input-wrapper">
                            <input type="password" id="current_password" name="current_password" required class="profile-password-input">
                            <span class="toggle-password" onclick="togglePasswordVisibility('current_password')">
                                <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                            </span>
                        </div>
                        @error('current_password')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <!-- New Password -->
                    <div class="profile-field password-field">
                        <label for="password" class="profile-label">New Password</label>
                        <div class="profile-password-input-wrapper">
                            <input type="password" id="password" name="password" required class="profile-password-input">
                            <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                                <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                            </span>
                        </div>
                        @error('password')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="profile-field password-field">
                        <label for="password_confirmation" class="profile-label">Confirm New Password</label>
                        <div class="profile-password-input-wrapper">
                            <input type="password" id="password_confirmation" name="password_confirmation" required class="profile-password-input">
                            <span class="toggle-password" onclick="togglePasswordVisibility('password_confirmation')">
                                <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                            </span>
                        </div>
                    </div>

                    <div class="profile-actions">
                        <button type="submit" class="btn-save">Update Password</button>
                    </div>
                </form>
            </div>

                <!-- ==================== SECTION 3: BROWSER SESSIONS ==================== -->
                <div class="profile-section">
                <h2 class="profile-section-title">Browser Sessions</h2>
                <p class="profile-section-desc">Manage and log out your active sessions on other browsers and devices.</p>

                @if(isset($sessions) && count($sessions) > 0)
                    <div class="sessions-list">
                        @foreach($sessions as $session)
                            <div class="session-item">
                                <div class="session-icon">
                                    @if($session->agent->isDesktop())
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#213639">
                                            <path d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                    @else
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#213639">
                                            <path d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                    @endif
                                </div>
                                <div class="session-details">
                                    <div class="session-device">{{ $session->agent->platform() ?? 'Unknown' }} - {{ $session->agent->browser() ?? 'Unknown' }}</div>
                                    <div class="session-meta">{{ $session->ip_address }}
                                        @if($session->is_current_device)
                                            <span class="current-device">(This device)</span>
                                        @else
                                            <span>Last active {{ $session->last_active }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="session-action">
                    <button type="button" onclick="document.getElementById('logout-sessions-form').style.display='flex'" class="btn-logout-session">Log Out Other Browser Sessions</button>
                </div>

                <!-- Logout Other Sessions Modal -->
                <div id="logout-sessions-form" class="modal">
                    <div class="modal-content">
                        <h3 class="modal-title">Confirm Password</h3>
                        <p class="modal-text">Please enter your password to log out other browser sessions.</p>
                        <form method="POST" action="{{ route('profile.sessions.logout') }}" class="modal-form">
                            @csrf
                            <div class="modal-field">
                                <input type="password" name="password" placeholder="Your password" required class="modal-input">
                            </div>
                            <div class="modal-actions">
                                <button type="button" onclick="document.getElementById('logout-sessions-form').style.display='none'" class="btn-modal-cancel">Cancel</button>
                                <button type="submit" class="btn-modal-confirm">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <!-- ==================== SECTION 4: CLIENT ADDRESSES ==================== -->
                @if(auth()->user()->isClient())
                <section class="profile-section">
                    <h2 class="profile-section-title">Delivery Addresses</h2>
                    <p class="profile-section-desc">Manage your delivery addresses for orders.</p>

                @livewire('address-manager')
                </section>
                @endif


                <!-- ==================== SECTION 5: TWO FACTOR AUTHENTICATION (ADMIN ONLY) ==================== -->
                @if(auth()->user()->isAdmin())
                <div class="profile-section">
                    <h2 class="profile-section-title">Two Factor Authentication</h2>
                    <p class="profile-section-desc">Add additional security to your account using two factor authentication.</p>

                    <div class="twofa-box">
                        <p class="twofa-status">Two factor authentication is currently <strong>{{ auth()->user()->two_factor_secret ? 'ENABLED' : 'DISABLED' }}</strong>.</p>

                        @if(auth()->user()->two_factor_secret)
                            <p class="twofa-instruction">Scan this QR code with Google Authenticator:</p>
                            <div class="qr-code">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>
                            <form method="POST" action="{{ route('two-factor.disable') }}" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-twofa-disable">Disable 2FA</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('two-factor.enable') }}">
                                @csrf
                                <button type="submit" class="btn-twofa-enable">Enable 2FA</button>
                            </form>
                        @endif
                    </div>
                </div>
                @endif

                <!-- ==================== SECTION 6: DELETE ACCOUNT ==================== -->
                <div class="profile-section delete-section">
                    <h2 class="profile-section-title delete-title">Delete Account</h2>
                    <p class="profile-section-desc">Once your account is deleted, all resources and data will be permanently deleted.</p>

                    <div class="delete-action">
                        <button type="button" onclick="document.getElementById('delete-account-form').style.display='flex'" class="btn-delete-account">Delete Account</button>
                    </div>

                    <!-- Delete Account Modal -->
                    <div id="delete-account-form" class="modal">
                        <div class="modal-content">
                            <h3 class="modal-title delete-modal-title">Confirm Account Deletion</h3>
                            <p class="modal-text">Are you sure you want to delete your account? This action cannot be undone.</p>
                            <form method="POST" action="{{ route('profile.destroy') }}" class="modal-form">
                                @csrf
                                @method('DELETE')
                                <div class="modal-field password-field">
                                    <label for="delete_password" class="profile-label">Password</label>
                                    <div class="password-input-wrapper">
                                        <input type="password" id="delete_password" name="password" placeholder="Enter your password to confirm" required class="modal-input">
                                        <span class="toggle-password" onclick="togglePasswordVisibility('delete_password')">
                                            <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-actions">
                                    <button type="button" onclick="document.getElementById('delete-account-form').style.display='none'" class="btn-modal-cancel">Cancel</button>
                                    <button type="submit" class="btn-modal-delete">Delete Permanently</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>

    <footer class="footer1">
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Facebook-Desktop.svg') }}" alt="facebook">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Instagram-Desktop.svg') }}" alt="instagram">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Youtube-Desktop.svg') }}" alt="youtube">
                <img class="poza-social" src="{{ asset('imagini/Icoana-X-Desktop.svg') }}" alt="x">
            </div>
        </div>
    </footer>


    <script src="{{ asset('index.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

</body>
</html>