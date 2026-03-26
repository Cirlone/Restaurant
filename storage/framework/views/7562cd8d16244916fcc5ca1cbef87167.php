<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="robots" content="noindex,nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
    <main class="food-info">
        <nav class="nav">
            <div class="poza-logo">
               <a href="/"><img src="<?php echo e(asset('imagini/Logo-Restaurant.svg')); ?>" alt="poza logo"></a>
            </div>
            <div class="nav-container">
                <ul class="nav-items">
                    <li><a class="nav-element" href="/">HOME</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#about">ABOUT US</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#menu">MENU</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#contact">CONTACT</a></li>
                    <li><a class="nav-element" href="#">BLOG</a></li>
                    <li><a class="nav-element" href="#">DELIVERY</a></li>
                </ul>
                <div class="order-container">
                    <input class="input-nav" type="text" placeholder="search">
                    <button class="btn-nav" onclick="window.location.href='<?php echo e(route('login')); ?>'" type="button">Login</button>
                    <a href="<?php echo e(route('login')); ?>"><img class="poza-user" src="<?php echo e(asset('imagini/Sign-In.svg')); ?>" alt="poza user"></a>
                    <img class="poza-cart" src="<?php echo e(asset('imagini/icon-cart.svg')); ?>" alt="poza-cart">
                    <img class="hamburger" src="<?php echo e(asset('imagini/Hamburgermenu.svg')); ?>" alt="poza hamburger">
                    <img class="close" src="<?php echo e(asset('imagini/hamburger-x.svg')); ?>" alt="poza x">
                </div>
            </div>
        </nav>

        <div class="container-food-info">
            <div class="cart-container">
                <div class="checkout-result">

                    <div class="checkout-icon-success">✓</div>

                    <h2 class="h2-cart">Order Confirmed!</h2>
                    <p class="checkout-message">Thank you for your order. Your payment was successful and your food is being prepared!</p>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($order)): ?>
                    <div class="checkout-order-details">
                        <h3 class="profile-section-title">Order Summary</h3>

                        <div class="cart-cost">
                            <p>Order #:</p>
                            <p><?php echo e($order->id); ?></p>

                            <p>Status:</p>
                            <p class="status-paid">Paid</p>

                            <p>Subtotal:</p>
                            <p><?php echo e(number_format($order->subtotal, 2)); ?> lei</p>

                            <p>Delivery:</p>
                            <p><?php echo e(number_format($order->delivery_fee, 2)); ?> lei</p>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->discount > 0): ?>
                                <p>Discount:</p>
                                <p>- <?php echo e(number_format($order->discount, 2)); ?> lei</p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <hr class="hr-cart">

                        <div class="cart-cost-total">
                            <p class="cart-total">Total Paid:</p>
                            <p class="cart-total"><?php echo e(number_format($order->total, 2)); ?> lei</p>
                        </div>

                        <div class="checkout-items">
                            <h3 class="profile-section-title">Items Ordered</h3>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <div class="checkout-item-row">
                                    <span><?php echo e($item->name); ?> x<?php echo e($item->quantity); ?></span>
                                    <span><?php echo e(number_format($item->price * $item->quantity, 2)); ?> lei</span>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="summary-buttons">
                        <a href="<?php echo e(url('/')); ?>#menu">
                            <button class="add-more-btn">Order More</button>
                        </a>
                        <a href="<?php echo e(route('dashboard')); ?>">
                            <button class="checkout-btn">Go to Dashboard</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="newsletter">
            <h3 class="h3-newsletter">Newsletter</h3>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('newsletter-form');

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1856216995-0', $__key);

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
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="<?php echo e(asset('imagini/Icoana-Facebook-Desktop.svg')); ?>" alt="poza facebook">
                <img class="poza-social" src="<?php echo e(asset('imagini/Icoana-Instagram-Desktop.svg')); ?>" alt="poza instagram">
                <img class="poza-social" src="<?php echo e(asset('imagini/Icoana-Youtube-Desktop.svg')); ?>" alt="poza youtube">
                <img class="poza-social" src="<?php echo e(asset('imagini/Icoana-X-Desktop.svg')); ?>" alt="poza twitter">
            </div>
        </div>
    </footer>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="<?php echo e(asset('index.js')); ?>"></script>
</body>
</html><?php /**PATH /var/www/html/resources/views/checkout/success.blade.php ENDPATH**/ ?>