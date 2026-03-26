<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - Restaurant</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
<nav class="nav">
    <div class="poza-logo">
        <a href="/"><img src="{{ asset('imagini/Logo-Restaurant.svg') }}" alt="poza logo"></a>
    </div>
    <div class="nav-container">
        <ul class="nav-items">
            <li><a class="nav-element" href="/">HOME</a></li>
        </ul>
    </div>
</nav>

<div class="Sign-In-Page">
    <div class="formular-sign">

        <h2 class="form-title-verify">Verify Your Email</h2>
        @if (!auth()->user()->hasVerifiedEmail())

            @if (session('status') === 'verification-link-sent')
                <div class="alert-success">
                    A new verification link has been sent to your email address.
                </div>
            @else
            <p class="verify-text">
                Thanks for signing up! Please verify your email address by clicking the link we sent you.
            </p>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button class="btn-verify" type="submit">
                    {{ session('status') === 'verification-link-sent'
                        ? 'Resend Verification Email'
                        : 'Send Verification Email' }}
                </button>
            </form>

        @endif

        <div class="buttons-verify-page">

            <div class="verify-links">
                <button type="button" onclick="window.location='{{ route('profile.show') }}'" class="btn-profile-verify">Edit Profile</button>
            </div>

            <div class="verify-links">
                <form method="POST" action="{{ route('logout.unverified') }}">
                    @csrf
                    <button type="submit" class="btn-logout-verify">Log Out</button>
                </form>
            </div>

        </div>

        <!-- ==================== DELETE ACCOUNT ==================== -->
        <div class="div-btn-delete-verify">
            <p class="verify-text">
                Changed your mind? You can delete your account before verifying.
            </p>

            <button type="button"
                onclick="document.getElementById('delete-account-form').style.display='flex'"
                class="btn-delete-account">
                Delete Account
            </button>
        </div>

        <!-- Delete Account Modal -->
        <div id="delete-account-form" class="modal" style="display:none;">
            <div class="modal-content">
                <h3 class="modal-title delete-modal-title">
                    Confirm Account Deletion
                </h3>

                <p class="modal-text">
                    Are you sure you want to delete your account?
                    This action cannot be undone.
                </p>

                <form method="POST"
                    action="{{ route('profile.destroy') }}"
                    class="modal-form">

                    @csrf
                    @method('DELETE')

                    <div class="modal-field">
                        <input type="password"
                            name="password"
                            placeholder="Enter your password to confirm"
                            required
                            class="modal-input">
                    </div>

                    <div class="modal-actions">
                        <button type="button"
                                onclick="document.getElementById('delete-account-form').style.display='none'"
                                class="btn-modal-cancel">
                            Cancel
                        </button>

                        <button type="submit"
                                class="btn-modal-delete">
                            Delete Permanently
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

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
</body>
</html>