<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Restaurant</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>

{{-- NAVBAR identical to login --}}
<nav class="nav">
    <div class="poza-logo">
    <a href="/"><img src="imagini/Logo-Restaurant.svg" alt="poza logo"></a>
    </div>

    <div class="nav-container">
        <ul class="nav-items">
            <li><a class="nav-element" href="/">HOME</a></li>
        </ul>
    </div>
</nav>

<div class="Sign-In-Page">
    <div class="formular-sign">

        <h2 class="form-title">Forgot Password</h2>

        <p class="form-text">
            Enter your email and we will send you a link to reset your password.
        </p>

        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-sign" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="row2-log">

                <input class="input-sign-email"
                       id="email"
                       type="email"
                       name="email"
                       placeholder="Enter your email"
                       value="{{ old('email') }}"
                       required>
            </div>

            <button class="btn-sign-in" type="submit">Send Reset Link</button>

            <a href="{{ route('login') }}" class="back-link">← Back to Login</a>
        </form>

    </div>
</div>

<footer class="footer1">
    <div class="social-media">
        <div class="social">
            <img class="poza-social" src="{{ asset('imagini/Icoana-Facebook-Desktop.svg') }}">
            <img class="poza-social" src="{{ asset('imagini/Icoana-Instagram-Desktop.svg') }}">
            <img class="poza-social" src="{{ asset('imagini/Icoana-Youtube-Desktop.svg') }}">
            <img class="poza-social" src="{{ asset('imagini/Icoana-X-Desktop.svg') }}">
        </div>
    </div>
</footer>

</body>
</html>
