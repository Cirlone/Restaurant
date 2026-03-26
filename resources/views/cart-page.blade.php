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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
    <main class="food-info">
        <nav class="nav">
            <div class="poza-logo">
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
                <div class="order-container">
                    <input class="input-nav" type="text" placeholder="search">
                    <button class="btn-nav" onclick="window.location.href='{{ route('login') }}'" type="button">Login</button>
                    <a href="{{ route('login') }}"><img class="poza-user" src="{{ asset('imagini/Sign-In.svg') }}" alt="poza user"></a>
                    <img class="poza-cart" src="{{ asset('imagini/icon-cart.svg') }}" alt="poza-cart">
                    <img class="hamburger" src="{{ asset('imagini/Hamburgermenu.svg') }}" alt="poza hamburger">
                    <img class="close" src="{{ asset('imagini/hamburger-x.svg') }}" alt="poza x">
                </div>
            </div>
        </nav>
        <div class="container-food-info">
            <livewire:cart/>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="newsletter">
            <h3 class="h3-newsletter">Newsletter</h3>
            @livewire('newsletter-form')
        </div>
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Facebook-Desktop.svg') }}" alt="poza facebook">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Instagram-Desktop.svg') }}" alt="poza instagram">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Youtube-Desktop.svg') }}" alt="poza youtube">
                <img class="poza-social" src="{{ asset('imagini/Icoana-X-Desktop.svg') }}" alt="poza twitter">
            </div>
        </div>
    </footer>
    
    {{-- Livewire JS --}}
    @livewireScripts
<script src="{{ asset('index.js') }}"></script>
</body>
</html>