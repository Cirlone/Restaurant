<div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Login</title>
    <meta name="description" content="Proiect Restaurant">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav">
        <div class="poza-logo">
            <img src="{{ asset('imagini/Logo-Restaurant.svg') }}" alt="poza logo">
        </div>
        <div class="nav-container">
            <ul class="nav-items">
                <li><a class="nav-element" href="/">HOME</a></li>
            </ul>
            <div class="butoane-log">
                <button class="btn-sign" type="button" onclick="window.location.href='{{ route('register') }}'">Sign in</button>
                <button class="btn-log" type="button" onclick="window.location.href='{{ route('login') }}'">Log in</button>
            </div>
        </div>
    </nav>

    <div class="Sign-In-Page">
        <div class="formular-sign">
            <!-- Livewire login form -->
            <form wire:submit="login" class="form-sign">
                @csrf

                <div class="row2-log">
                    <input class="input-sign-email"
                           type="email"
                           placeholder="Email"
                           wire:model.live="email"
                           required
                           autofocus
                           autocomplete="username">
                    @error('email') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="row3-log">
                    <input class="input-password"
                           type="password"
                           placeholder="Password"
                           wire:model.live="password"
                           required
                           autocomplete="current-password"
                           id="Password">
                    <span class="toggle-password" onclick="togglePasswordVisibility('Password')">
                        <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" alt="Toggle Password" class="eye-icon">
                    </span>
                    @error('password') <p class="error">{{ $message }}</p> @enderror
                </div>

                @if (session('error'))
                    <p class="error">{{ session('error') }}</p>
                @endif

                <a href="{{ route('password.request') }}"><p class="forgot">Forgot Password?</p></a>

                <button class="btn-sign-in" type="submit">
                    Log In
                </button>
            </form>

            <p class="or">Or log in with</p>
            <div class="butoane-create-log">
                <button class="btn-google" type="button">
                    <img src="{{ asset('imagini/Iconita-Google.svg') }}" alt="Google Icon" class="btn-icon"> 
                    <p>Google</p>
                </button>  
                <button class="btn-apple" type="button">
                    <img src="{{ asset('imagini/Iconita-Apple.svg') }}" alt="Apple Icon" class="btn-icon"> 
                    <p>Apple</p>
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
        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
</div>
