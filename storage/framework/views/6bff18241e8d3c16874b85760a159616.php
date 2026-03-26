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
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="body-dashboard">

       
<?php echo $__env->make('livewire.nav-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <section class="dashboard">
        <div class="flex-sectiune-dashboard">
            <div class="left-bar">
                <a href class="flex-dashboard <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                    <img class="dashboard-icon" src="imagini/dashboard-layout_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">Dashboard</p>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->canAccessEcommerce()): ?>
                <a href="<?php echo e(route('ecommerce')); ?>" class="dashboard-link">
                    <div class="flex-dashboard">
                        <img class="dashboard-icon" src="<?php echo e(asset('imagini/kart2.svg')); ?>" alt="admin">
                        <p class="p-dashboard">E-commerce</p>
                    </div>
                </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->canManageUsers()): ?>
                <a href="<?php echo e(route('users.index')); ?>" class="flex-dashboard <?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">
                    <img class="dashboard-icon" src="imagini/usericon2.svg" alt="dashboard-icon">
                    <p class="p-dashboard <?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">Users</p>
                </a>
             <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
             <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/online-delivery_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">My Orders</p>
                </div>
                <a href="<?php echo e(route('menu-items')); ?>" class="flex-dashboard <?php echo e(request()->routeIs('menu-items') ? 'active' : ''); ?>">
                    <img class="dashboard-icon" src="imagini/food-restaurant_svgrepo.com.svg" alt="menu">
                    <p class="p-dashboard <?php echo e(request()->routeIs('menu-items') ? 'active' : ''); ?>">Menu Items</p>
                </a>
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/payment-bitcoin_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">Transactions</p>
                </div>
                <a href="<?php echo e(route('reports')); ?>" class="flex-dashboard <?php echo e(request()->routeIs('reports') ? 'active' : ''); ?>">
                    <img class="dashboard-icon" src="imagini/report-data_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard <?php echo e(request()->routeIs('reports') ? 'active' : ''); ?>">Reports</p>
                </a>
                <a href="<?php echo e(route('categories')); ?>" class="flex-dashboard <?php echo e(request()->routeIs('categories') ? 'active' : ''); ?>">
                    <img class="dashboard-icon" src="imagini/categories-icon.svg" alt="categories">
                    <p class="p-dashboard <?php echo e(request()->routeIs('categories') ? 'active' : ''); ?>">Categories</p>
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
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo e(asset('index.js')); ?>"></script>

</html>

<?php /**PATH /var/www/html/resources/views/e-commerce.blade.php ENDPATH**/ ?>