<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

      <!-- Tailwind + JS (via Vite) -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])

       <!-- ✅ Force custom CSS to override Tailwind -->
       <link rel="stylesheet" href="{{ asset('style.css') }}?v={{ filemtime(public_path('style.css')) }}">

      <!-- Livewire Styles -->
      @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>

  <body class="font-sans antialiased body-dashboard">
      <x-banner />

      <!-- ✅ Navbar -->
      <nav class="nav-dashboard">
          <div class="poza-logo-dashboard">
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

              @auth
              <div class="order-container-dashboard">
                  <div class="logout-dropdown">
                  @livewire('user-avatar')
                  </div>
              </div>
              @endauth

              <img class="hamburger" src="{{ asset('imagini/Hamburgermenu.svg') }}" alt="poza hamburger">
              <img class="close" src="{{ asset('imagini/hamburger-x.svg') }}" alt="poza x">
          </div>
      </nav>

      <!-- ✅ Page Heading -->
      @if (isset($header))
          <header class="bg-white shadow">
              <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                  {{ $header }}
              </div>
          </header>
      @endif

      <!-- ✅ Page Content -->
      <main id="jetstream-profile" class="body-dashboard-content">
          {{ $slot }}
      </main>

      @stack('modals')
      @livewireScripts
      
      <!-- Stripe JS -->
      <script src="https://js.stripe.com/v3/"></script>
      <script src="{{ asset('index.js') }}" defer></script>
  </body>
</html>