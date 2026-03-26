<nav class="nav-dashboard">
    <div class="poza-logo-dashboard">
        <a href="/"><img src="imagini/Logo-Restaurant.svg" alt="poza logo"></a>
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
            
            @auth
                <div class="logout-dropdown">
                    <div class="user-log">
                        <img class="user" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->first_name }}{{ Auth::user()->last_name}}">
                        <img class="arrow" src="{{ asset('imagini/Vector.svg') }}" alt="arrow">
                    </div>
                    <ul class="dropdown-options">
                        <li><span class="user-name">👤 Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></li>
                        <li><button type="button" onclick="window.location.href='{{ route('profile.show') }}'" class="dropdown-link">My Profile</button></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="logout-button">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="auth-buttons">
                    <button class="btn-sign" onclick="window.location.href='{{ route('login') }}'">Sign in</button>
                    <button class="btn-log" onclick="window.location.href='{{ route('register') }}'">Register</button>
                </div>
            @endauth
            
            <img class="hamburger" id="hamburger-dashboard" src="imagini/Hamburgermenu.svg" alt="poza hamburger">
            <img class="close" id="close-dashboard" src="imagini/hamburger-x.svg" alt="poza x">
        </div>
    </div>
</nav>