<nav class="nav-dashboard">
    <div class="poza-logo-dashboard">
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
        <div class="order-container-dashboard">
            <input class="input-nav2" type="text" placeholder="search">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <div class="logout-dropdown">
                    <div class="user-log">
                        <img class="user" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="<?php echo e(Auth::user()->first_name); ?><?php echo e(Auth::user()->last_name); ?>">
                        <img class="arrow" src="<?php echo e(asset('imagini/Vector.svg')); ?>" alt="arrow">
                    </div>
                    <ul class="dropdown-options">
                        <li><span class="user-name">👤 Welcome, <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></span></li>
                        <li><button type="button" onclick="window.location.href='<?php echo e(route('profile.show')); ?>'" class="dropdown-link">My Profile</button></li>
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="logout-button">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="auth-buttons">
                    <button class="btn-sign" onclick="window.location.href='<?php echo e(route('login')); ?>'">Sign in</button>
                    <button class="btn-log" onclick="window.location.href='<?php echo e(route('register')); ?>'">Register</button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
            <img class="hamburger" id="hamburger-dashboard" src="imagini/Hamburgermenu.svg" alt="poza hamburger">
            <img class="close" id="close-dashboard" src="imagini/hamburger-x.svg" alt="poza x">
        </div>
    </div>
</nav><?php /**PATH /var/www/html/resources/views/livewire/nav-dashboard.blade.php ENDPATH**/ ?>