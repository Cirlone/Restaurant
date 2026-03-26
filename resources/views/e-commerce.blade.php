<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce - Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    @livewireStyles
</head>

<body class="body-dashboard">

       
@include('livewire.nav-dashboard')
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
                <h2 class="h2-dashboard">Dashboard</h2>
            <div class="up">
                <!-- BIG GRAPHS -->
                <div class="graphs">
                    <!-- Orders Chart -->
                    <div class="graph">
                        <div class="graph-header">
                            <h3 class="graph-title1">Recent Orders</h3>
                        </div>
                        <div class="chart-container orders-chart">
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Revenue Chart -->
                    <div class="graph">
                        <div class="graph-header">
                            <h3 class="graph-title">Weekly Revenue</h3>
                            <div class="time-period-buttons">
                                <button class="period-btn" data-period="daily">Daily</button>
                                <button class="period-btn active" data-period="weekly">Weekly</button>
                                <button class="period-btn" data-period="monthly">Monthly</button>
                                <button class="period-btn" data-period="yearly">Yearly</button>
                            </div>
                        </div>
                        <div class="chart-container revenue-chart">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- First Table -->
                <div class="table-scroll">
                    <table class="down" id="table-ecommerce">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#2334</td>
                                <td>Joe Schmidt</td>
                                <td>10/10/2025</td>
                                <td>12:34</td>
                                <td>$124</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td>#2335</td>
                                <td>Jane Doe</td>
                                <td>10/10/2025</td>
                                <td>12:54</td>
                                <td>$103</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td>#2336</td>
                                <td>Mark Kane</td>
                                <td>10/10/2025</td>
                                <td>13:12</td>
                                <td>$87</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <a href="#">See all</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Second Table -->
                <div class="table-scroll">
                    <table class="down" id="table-ecommerce">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#2334</td>
                                <td>Joe Schmidt</td>
                                <td>10/10/2025</td>
                                <td>12:34</td>
                                <td>$124</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td>#2335</td>
                                <td>Jane Doe</td>
                                <td>10/10/2025</td>
                                <td>12:54</td>
                                <td>$103</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td>#2336</td>
                                <td>Mark Kane</td>
                                <td>10/10/2025</td>
                                <td>13:12</td>
                                <td>$87</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <a href="#">See all</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Third Table -->
                <div class="table-scroll">
                    <table class="down" id="table-ecommerce">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#2334</td>
                                <td>Joe Schmidt</td>
                                <td>10/10/2025</td>
                                <td>12:34</td>
                                <td>$124</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td>#2335</td>
                                <td>Jane Doe</td>
                                <td>10/10/2025</td>
                                <td>12:54</td>
                                <td>$103</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td>#2336</td>
                                <td>Mark Kane</td>
                                <td>10/10/2025</td>
                                <td>13:12</td>
                                <td>$87</td>
                                <td>Online</td>
                                <td>
                                    <a href="#" class="red">Accept</a>
                                    <a href="#">Reject</a>
                                </td>
                                <td><a href="#">👁️</a></td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <a href="#">See all</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        </section>
@livewireScripts
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('index.js') }}"></script>

</html>

