
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    @livewireStyles

</head>

<body class="body-dashboard">
<livewire:nav-dashboard />
      
        <section class="dashboard">
        <div class="flex-sectiune-dashboard">
            <div class="left-bar">
                <a href class="flex-dashboard {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <img class="dashboard-icon" src="imagini/dashboard-layout_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</p>
                </a>
                @if(auth()->user()->canAccessEcommerce())
                <a href="{{ route('ecommerce') }}" class="dashboard-link">
                    <div class="flex-dashboard">
                        <img class="dashboard-icon" src="{{ asset('imagini/kart2.svg') }}" alt="admin">
                        <p class="p-dashboard">E-commerce</p>
                    </div>
                </a>
                @endif
                @if(auth()->user()->canManageUsers())
                <a href="{{ route('users.index') }}" class="flex-dashboard {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <img class="dashboard-icon" src="imagini/usericon2.svg" alt="dashboard-icon">
                    <p class="p-dashboard {{ request()->routeIs('users.*') ? 'active' : '' }}">Users</p>
                </a>
             @endif
             <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/online-delivery_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">My Orders</p>
                </div>
                <a href="{{ route('menu-items') }}" class="flex-dashboard {{ request()->routeIs('menu-items') ? 'active' : '' }}">
                    <img class="dashboard-icon" src="imagini/food-restaurant_svgrepo.com.svg" alt="menu">
                    <p class="p-dashboard {{ request()->routeIs('menu-items') ? 'active' : '' }}">Menu Items</p>
                </a>
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/payment-bitcoin_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">Transactions</p>
                </div>
                <a href="{{ route('reports') }}" class="flex-dashboard {{ request()->routeIs('reports') ? 'active' : '' }}">
                    <img class="dashboard-icon" src="imagini/report-data_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard {{ request()->routeIs('reports') ? 'active' : '' }}">Reports</p>
                </a>
                <a href="{{ route('categories') }}" class="flex-dashboard {{ request()->routeIs('categories') ? 'active' : '' }}">
                    <img class="dashboard-icon" src="imagini/categories-icon.svg" alt="categories">
                    <p class="p-dashboard {{ request()->routeIs('categories') ? 'active' : '' }}">Categories</p>
                </a> 
            </div>

            <div class="right">
                <h2 class="h2-dashboard">Users</h2>

                <button class="btn-create-user" onclick="window.location.href='{{ route('users.create') }}'" type="button">
                    Create User
                </button>

                {{-- Livewire handles search, filters & table --}}
                <livewire:users-table />
            </div>

        </div>

</section>
@livewireScripts
<!-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> -->




</body>
<script src="{{ asset('index.js') }}"></script>
</html>


