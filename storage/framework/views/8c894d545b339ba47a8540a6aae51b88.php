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
</head>
<body class="body-dashboard">
<?php echo $__env->make('livewire.nav-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="dashboard">
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
        <div class="flex-sectiune-dashboard">
            <div class="right">
                <h2 class="h2-dashboard">Menu Categories</h2>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('category-manager');

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2292613331-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
            </div>
        </div>
    </section>
    
    <script src="<?php echo e(asset('index.js')); ?>"></script>
</body>
</html><?php /**PATH /var/www/html/resources/views/categories.blade.php ENDPATH**/ ?>