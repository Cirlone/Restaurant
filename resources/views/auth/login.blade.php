<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
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
        <div class="butoane-log">
            <button class="btn-sign" id="signButton" type="button">Sign in</button>
            <button class="btn-log" id="logButton" type="button">Log in</button>
        </div>
    </div>
</nav>

<div class="Sign-In-Page">
    <div class="formular-sign">

        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form class="form-sign" action="{{ route('login.authenticate') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="row2-log">
                <input class="input-sign-email" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>
            @error('email')<div class="error-message">{{ $message }}</div>@enderror

            <!-- Password -->
            <div class="row3-log">
                <input class="input-password" type="password" placeholder="Password" name="password" id="Password" required autocomplete="current-password">
                <span class="toggle-password" onclick="togglePasswordVisibility('Password')">
                    <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                </span>
            </div>
            @error('password')<div class="error-message">{{ $message }}</div>@enderror

            <a href="{{ route('password.request') }}"><p class="forgot">Forgot Password?</p></a>

            <button class="btn-sign-in" type="submit">Log In</button>
        </form>

        <p class="or">Or log in with</p>
        <div class="butoane-create-log">
            <button onclick="window.location.href='{{ route('google.redirect') }}'" class="btn-google">
                <img src="{{ asset('imagini/Iconita-Google.svg') }}" class="btn-icon"> Google
            </button>
            <button class="btn-facebook" type="button" onclick="window.location='{{ route('facebook.redirect') }}'">
                <img src="{{ asset('imagini/Iconita-Facebook.svg') }}" alt="Facebook Icon" class="btn-icon"> <p>Facebook</p>
            </button>
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

<script>
    window.routes = {
    login: "{{ route('login') }}",
    register: "{{ route('register') }}"
};
</script>
<script src="{{ asset('index.js') }}"></script>
</html>
