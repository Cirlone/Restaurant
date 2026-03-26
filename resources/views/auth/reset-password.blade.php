<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>

<body class="Sign-In-Page">

<div class="formular-sign">

    <h2 class="form-title">Reset Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        {{-- EMAIL --}}
        <label for="email">Email Address</label>
        <input
            id="email"
            type="email"
            name="email"
            required
            value="{{ old('email', request('email')) }}"
            class="form-input form-input-margin"
        >

        {{-- NEW PASSWORD --}}
        <label for="password">New Password</label>
        <div class="password-input-wrapper">
            <input
                id="password"
                type="password"
                name="password"
                required
                class="password-input"
            >
            <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
            </span>
        </div>

        {{-- CONFIRM --}}
        <label for="password_confirmation">Confirm Password</label>
        <div class="password-input-wrapper">
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                class="password-input"
            >
            <span class="toggle-password" onclick="togglePasswordVisibility('password_confirmation')">
                <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
            </span>
        </div>

        <button type="submit" class="btn-sign-in reset-btn">
            Reset Password
        </button>
    </form>

    <a href="{{ route('login') }}" class="back-link">
        Back to Login
    </a>
</div>

<script>
function togglePasswordVisibility(id) {
    const input = document.getElementById(id);
    const eyeIcon = input.nextElementSibling?.querySelector('img') || 
                   input.parentElement.querySelector('.toggle-password img');
    
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}
</script>

</body>
</html>