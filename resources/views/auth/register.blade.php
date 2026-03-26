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
            <li><a class="nav-element" href='/'>HOME</a></li>
        </ul>
        <div class="butoane-log">
            <button class="btn-sign" id="signButton" type="button">Sign in</button>
            <button class="btn-log" id="logButton" type="button">Log in</button>
        </div>
    </div>
</nav>

<div class="Sign-In-Page">
    <div class="formular-sign">
        <div class="flex-already">
            <a href="{{ route('login') }}"><p>Already have an account?</p></a>
        </div>

        <form class="form-sign" action="{{ route('register.store') }}" method="POST">
            @csrf

            <!-- Name -->
           <div class="row1-sign">
                <input class="input-sign" type="text" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required>
                <input class="input-sign" type="text" placeholder="Last Name" name="last_name"value="{{ old('last_name') }}" required>
            </div>
            @error('first_name')<div class="error-message">{{ $message }}</div>@enderror
            @error('last_name')<div class="error-message">{{ $message }}</div>@enderror

            <!-- Email -->
            <div class="row2-sign">
                <input class="input-sign-email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
            </div>
            @error('email')<div class="error-message">{{ $message }}</div>@enderror

            <!-- Password -->
            <div class="row3-sign">
                <input class="input-password" type="password" placeholder="Password" name="password" id="Password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('Password')">
                    <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                </span>
            </div>
            @error('password')<div class="error-message">{{ $message }}</div>@enderror

            <!-- Confirm Password -->
            <div class="row4-sign">
                <input class="input-sign-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" id="confirmPassword" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('confirmPassword')">
                    <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                </span>
            </div>
            @error('password_confirmation')<div class="error-message">{{ $message }}</div>@enderror

            <!-- Terms -->
            <div class="checkbox">
                <input type="checkbox" class="check" id="terms" name="terms" value="check" required>
                <label for="terms">
                    I agree to the
                    <a href="{{ route('terms.show') }}" target="_blank">Terms of Service</a>
                    and
                    <a href="{{ route('policy.show') }}" target="_blank">Privacy Policy</a>.
                </label>
            </div>

            <button class="btn-sign-in" type="submit">Create account</button>
        </form>

        <p class="or">Or sign in with</p>
        <div class="butoane-create-account">
            <button class="btn-google" type="button" onclick="window.location='{{ route('google.redirect') }}'">
                <img src="{{ asset('imagini/Iconita-Google.svg') }}" alt="Google Icon" class="btn-icon"> <p>Google</p>
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