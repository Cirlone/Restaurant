<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password - Restaurant</title>
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

        <h2 class="form-title">Confirm Password</h2>
        <p class="form-text">This is a secure area. Please confirm your password before continuing.</p>

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form class="form-sign" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="row3-log">
                <input class="input-password" type="password" name="password" id="password"
                    placeholder="Password" required autocomplete="current-password" autofocus>
                <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                    <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                </span>
            </div>
            @error('password')<div class="error-message">{{ $message }}</div>@enderror

            <button class="btn-sign-in" type="submit">Confirm</button>
        </form>
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