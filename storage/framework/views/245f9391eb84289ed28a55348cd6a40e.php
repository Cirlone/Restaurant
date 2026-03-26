<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($open): ?>
        <div class="modal-cart-backdrop">
            <div class="modal-cart-box">
                <button class="modal-cart-close" wire:click="close">✕</button>

                <h3 class="h3-modal-cart">Item added to cart</h3>

                <div class="grid-modal-cart">
                    <p class="modal-cart-name">
                        <strong>Name:</strong>
                    </p>
                    <p class="modal-cart-name">
                        <strong><?php echo e($name); ?></strong>
                    </p>

                    <p class="modal-cart-price">
                        <strong>Price:</strong>
                    </p>
                    <p class="modal-cart-price">
                        <strong><?php echo e($price); ?> lei</strong>
                    </p>

                    <p class="modal-cart-quantity">
                        <strong>Quantity:</strong>
                    </p>
                    <p class="modal-cart-quantity">
                        <strong><?php echo e($quantity); ?></strong>
                    </p>
                </div>
                
                <hr class="hr-modal-cart">

                <div class="grid-modal-cart">
                    <p class="modal-cart-total">
                        <strong>Total:</strong>
                    </p>
                    <p class="modal-cart-total">
                        <strong><?php echo e($total); ?> lei</strong>
                    </p>
                </div>

                <div class="modal-cart-actions">
                    <button wire:click="close" class="btn-continue-shopping">
                        Continue shopping
                    </button>

                    <a href="<?php echo e(route('cart')); ?>">
                        <button class="btn-cart-details">
                            Cart details
                        </button>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH /var/www/html/resources/views/livewire/add-to-cart-modal.blade.php ENDPATH**/ ?>