<nav class="nav">
            <div class="poza-logo">
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
                <div class="order-container">
                    <input class="input-nav" type="text" placeholder="search">
                    <button class="btn-nav" onclick="window.location.href='{{ route('login') }}'" type="button">Login</button>
                    <a href="{{ route('login') }}"><img class="poza-user" src="imagini/Sign-In.svg" alt="poza user"></a>
                    <!-- <a href="{{ route('cart') }}">
                        <img
                            src="{{ asset('imagini/icon-cart.svg') }}"
                            class="poza-cart"
                            alt="Cart"
                        >
                    </a> -->
                    <livewire:cart-icon />

                    <img class="hamburger" src="imagini/Hamburgermenu.svg" alt="poza hamburger">
                    <img class="close" src="imagini/hamburger-x.svg" alt="poza x">
                </div>
            </div>
        </nav>