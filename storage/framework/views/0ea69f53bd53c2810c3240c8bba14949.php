<nav class="nav">
            <div class="poza-logo">
               <a href="/"><img src="imagini/Logo-Restaurant.svg" alt="poza logo"></a>
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
                    <a href="<?php echo e(route('login')); ?>"><img class="poza-user" src="imagini/Sign-In.svg" alt="poza user"></a>
                    <!-- <a href="<?php echo e(route('cart')); ?>">
                        <img
                            src="<?php echo e(asset('imagini/icon-cart.svg')); ?>"
                            class="poza-cart"
                            alt="Cart"
                        >
                    </a> -->
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart-icon', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3630709517-0', $__key);

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

                    <img class="hamburger" src="imagini/Hamburgermenu.svg" alt="poza hamburger">
                    <img class="close" src="imagini/hamburger-x.svg" alt="poza x">
                </div>
            </div>
        </nav><?php /**PATH /var/www/html/resources/views/livewire/navbar.blade.php ENDPATH**/ ?>