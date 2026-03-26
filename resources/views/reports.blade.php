<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
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
                <h2 class="h2-dashboard">Reports & Analytics</h2>
                
                <div class="date-filter">
                    <select id="reportPeriod" class="period-select">
                        <option value="week">This Week</option>
                        <option value="month" selected>This Month</option>
                        <option value="quarter">This Quarter</option>
                        <option value="year">This Year</option>
                    </select>
                </div>

                <div class="stats-row">
                    <div class="stat-card">
                        <p class="stat-title">Total Revenue</p>
                        <h3 class="stat-value" id="totalRevenue">$45,678</h3>
                        <small class="stat-change stat-change-positive">+12.5%</small>
                    </div>
                    <div class="stat-card">
                        <p class="stat-title">Total Orders</p>
                        <h3 class="stat-value" id="totalOrders">1,892</h3>
                        <small class="stat-change stat-change-positive">+8.3%</small>
                    </div>
                    <div class="stat-card">
                        <p class="stat-title">Avg Order Value</p>
                        <h3 class="stat-value" id="avgOrder">$24.15</h3>
                        <small class="stat-change stat-change-positive">+3.2%</small>
                    </div>
                    <div class="stat-card">
                        <p class="stat-title">Conversion Rate</p>
                        <h3 class="stat-value" id="conversion">3.8%</h3>
                        <small class="stat-change stat-change-negative">-0.5%</small>
                    </div>
                </div>

                <div class="charts-row">
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3>Revenue Overview</h3>
                            <div class="chart-legend">
                                <span class="legend-item"><span class="dot dot-blue"></span> Revenue</span>
                                <span class="legend-item"><span class="dot dot-green"></span> Orders</span>
                            </div>
                        </div>
                        <canvas id="revenueChart" height="250"></canvas>
                    </div>
                    
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3>Popular Categories</h3>
                        </div>
                        <canvas id="categoriesChart" height="220"></canvas>
                    </div>
                </div>

                <div class="charts-row">
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3>Daily Orders</h3>
                        </div>
                        <canvas id="dailyOrdersChart" height="200"></canvas>
                    </div>
                    
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3>Payment Methods</h3>
                        </div>
                        <canvas id="paymentChart" height="200"></canvas>
                    </div>
                </div>

                <div class="table-container">
                    <h3>Top Selling Items</h3>
                    <table class="reports-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Quantity Sold</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Margherita Pizza</td>
                                <td>Pizza</td>
                                <td>342</td>
                                <td>$5,472</td>
                            </tr>
                            <tr>
                                <td>Pepperoni Pizza</td>
                                <td>Pizza</td>
                                <td>287</td>
                                <td>$4,879</td>
                            </tr>
                            <tr>
                                <td>Caesar Salad</td>
                                <td>Salads</td>
                                <td>198</td>
                                <td>$1,782</td>
                            </tr>
                            <tr>
                                <td>Spaghetti Carbonara</td>
                                <td>Pasta</td>
                                <td>176</td>
                                <td>$2,288</td>
                            </tr>
                            <tr>
                                <td>Tiramisu</td>
                                <td>Desserts</td>
                                <td>145</td>
                                <td>$1,015</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('index.js') }}"></script>
</html>