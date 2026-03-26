<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <!--<link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
     
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body>
<header class="header">
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

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3757256240-0', $__key);

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
        </nav>
        <div class="continut-header">
            <h1>The Best Grill in Town</h1>
            <div>
                <button class="header-btn" type="button">Order</button>
            </div>
        </div>
        <div class="poze-mancare">
            <img class="poza-mancare" src="imagini/img-steak.svg" alt="poza-friptura">
            <img class="poza-mancare" src="imagini/img-salad.svg" alt="poza-salata">
            <img class="poza-mancare" src="imagini/img-burger.svg" alt="poza-burger">

        </div>
    </header>
         <!-- About Us -->
    <section id="about" class="sectiune-about">
        <h2 class="h2-about">About Us</h2>
        <div class="continut-about">
            <div class="imagine-stanga">
                <img class="imagine-grill" src="imagini/img-grill.svg" alt="poza-grill">
            </div>
            <div class="container-dreapta">
                <h3 class="h3-about">The best burgers</h3>
                <p class="p-about">Lorem Ipsum is simply the <br> dummy text of the print <br> typesetting industry</p>
                <p class="p-about">Lorem Ipsum is simply the <br> dummy text of the print <br> typesetting industry</p>
                <button class="btn-about" type="button">Discover</button>
            </div>
        </div>
    </section>
    <!-- Sfarsit About Us -->

    <!--Servicii-->
    <section class="servicii" id="menu">
        <h2 class="h2-servicii">Our Menu</h2>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('menu-items', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3757256240-1', $__key);

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
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('add-to-cart-modal', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3757256240-2', $__key);

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
    </section>

    <!-- Sectiune Reviews -->

    <section class="sectiune-reviews">
        <h2 class="h2-about">Reviews</h2>
        <div class="container-reviews">
        <div class="review-stanga">
            <div class="mesaj-stanga">
                <img class="stele-stanga" src="imagini/Stele.svg" alt="poza stele">
                <p class="p-stanga">
                    Lorem Ipsum is simply dummy <br> text of the printing and <br> typesetting industry. Lorem
                </p>
                <h3 class="h3-reviews-stanga">Jessica Blue</h3>
            </div>
            <div class="img-stanga">
                <img class="poza-fata" src="imagini/poza-fata.svg" alt="poza fata">
            </div>
        </div>

        <div class="review-dreapta">
            <div class="mesaj-dreapta">
                <img class="stele-dreapta" src="imagini/Stele.svg" alt="poza stele">
                <p class="p-dreapta">
                    Lorem Ipsum is simply dummy <br> text of the printing and <br> typesetting industry. Lorem
                </p>
                <h3 class="h3-reviews-dreapta">Michael Towers</h3>
            </div>
                <div>
                    <img class="poza-barbat" src="imagini/poza-barbat.svg" alt="poza fata">
                </div>
        </div>
        </div>
    </section>
        <section id="contact" class="sectiune-contact">
        <h2 class="h2-contact">Contact Us</h2>
        <div class="container-contact">
            <div class="orar">
                <div class="fripturi">
                    <img class="poza-friptura" src="imagini/Group.svg" alt="friptura">
                    <img class="poza-friptura" src="imagini/Group.svg" alt="friptura">
                </div>
                <h3 class="h3-orar">SCHEDULE</h3>
                <h4 class="h4-orar">WE ARE OPEN</h4>
                <p class="p-orar">Monday-Sunday</p>
                <img class="sageata-orar" src="imagini/Sageata-orar.svg" alt="sageata">
                <p class="orar-interval">16.00 - 02.00</p>
            </div>
            <div class="formular">
                <h3 class="h3-form">Reservations</h3>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('reservation-form');

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3757256240-3', $__key);

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
    <!-- Sfarsit Contact -->
    <footer class="footer">
    <?php
        $isSubscribed = false;
        if(auth()->check()) {
            $isSubscribed = \App\Models\Newsletter::where('mail', auth()->user()->email)->exists();
        }
    ?>
    
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

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3757256240-4', $__key);

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
            <img class="poza-social" src="imagini/Icoana-Facebook-Desktop.svg" alt="poza instagram">
            <img class="poza-social" src="imagini/Icoana-Instagram-Desktop.svg" alt="poza facebook">
            <img class="poza-social" src="imagini/Icoana-Youtube-Desktop.svg" alt="poza twitter">
            <img class="poza-social" src="imagini/Icoana-X-Desktop.svg" alt="poza youtube">
        </div>
    </div>
</footer>
     
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
<script src="<?php echo e(asset('index.js')); ?>"></script>
</html><?php /**PATH /var/www/html/resources/views/index.blade.php ENDPATH**/ ?>