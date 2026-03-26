{{-- CUSTOM TOPBAR OVERRIDE --}}
@props(['navigation'])

<nav class="nav-dashboard">
            <div class="poza-logo-dashboard">
                <img src="imagini/Logo-Restaurant.svg" alt="poza logo">
            </div>
            <div class="nav-container">
                <ul class="nav-items">
                    <li><a class="nav-element" href="{{ url('dashboard') }}#about">HOME</a></li>
                    <li><a class="nav-element" href="{{ url('/') }}#about">ABOUT US</a></li>
                    <li><a class="nav-element" href="{{ url('/') }}#menu">MENU</a></li>
                    <li><a class="nav-element" href="{{ url('/') }}#contact">CONTACT US</a></li>
                    <li><a class="nav-element" href="#">BLOG</a></li>
                    <li><a class="nav-element" href="#">DELIVERY</a></li>
                </ul>
                <div class="order-container-dashboard">
                    <input class="input-nav2" type="text" placeholder="search">
                    <div class="logout-dropdown">
                        <div class="user-log">
                            <img class="user" src="{{ asset('imagini/default-avatar.svg') }}" alt="{{ Auth::user()->name }}">
                            <img class="arrow" src="{{ asset('imagini/Vector.svg') }}" alt="arrow">
                        </div>
                        <ul class="dropdown-options">
                            <li><span class="user-name">👤Welcome, {{ Auth::user()->name }}</span></li>
                            <li><button type="button" onclick="window.location.href='{{ route('profile.show') }}'" class="dropdown-link">My Profile</button></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-button">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <img class="hamburger" id="hamburger-dashboard" src="imagini/Hamburgermenu.svg" alt="poza hamburger">
                    <img class="close" id = "close-dashboard" src="imagini/hamburger-x.svg" alt="poza x">

                </div>
            </div>
        </nav>
<script src="{{ asset('index.js') }}"></script>
