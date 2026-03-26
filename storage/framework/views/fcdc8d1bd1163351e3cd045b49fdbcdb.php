<a href="<?php echo e(route('cart')); ?>" class="cart-icon-wrapper">
    <img
        src="<?php echo e(asset('imagini/icon-cart.svg')); ?>"
        class="poza-cart"
        alt="Cart"
    >

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($count > 0): ?>
        <span class="cart-badge">
            <?php echo e($count); ?>

        </span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</a>
<?php /**PATH /var/www/html/resources/views/livewire/cart-icon.blade.php ENDPATH**/ ?>