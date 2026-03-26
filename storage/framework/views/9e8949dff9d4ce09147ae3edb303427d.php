<div class="cart-container">
    <h2 class="h2-cart">MY CART</h2>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($cart) > 0): ?>
    <div class="cart-table-container">

        <table class="cart-table">
            <thead class="cart-thead">
                <tr>
                    <th class="cart-th">
                        <div class="cart-header-left">
                            <input
                                type="checkbox"
                                wire:model.live="selectAll"
                            >
                            <p>Select all</p>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($selectedItems) > 0): ?>
                            <button class="btn-delete-selected" wire:click="deleteSelected">
                                Delete Selected (<?php echo e(count($selectedItems)); ?>)
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr class="cart-item-row" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = ''.e($item['id']).''; ?>wire:key="<?php echo e($item['id']); ?>">
                    <td class="cart-product-img">
                        <img class="cart-img" src="<?php echo e(asset($item['image'])); ?>" width="60" alt="<?php echo e($item['name']); ?>">
                    </td>
                    <td class="cart-product-price">
                        <div>
                            <strong><?php echo e($item['name']); ?></strong>
                            <p><?php echo e($item['price']); ?> lei</p>
                        </div>
                        <input class="cart-item-checkbox"
                            type="checkbox"
                            value="<?php echo e($item['id']); ?>"
                            wire:model.live="selectedItems"
                        >
                        <button class="cart-remove-btn remove-absolute"
                            wire:click="remove(<?php echo e($item['id']); ?>)">
                            <img src="imagini/trash-bin.svg">
                        </button>
                   </td>
                    <td class="cart-quantity-control">
                        <button class="btn-plus-minus" wire:click="decrement(<?php echo e($item['id']); ?>)">-</button>
                        <span class="cart-item-quantity"><?php echo e($item['quantity']); ?></span>
                        <button class="btn-plus-minus" wire:click="increment(<?php echo e($item['id']); ?>)">+</button>
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </tbody>
        </table>

        <div class="voucher">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($appliedVoucher): ?>

                <div class="voucher-header">
                    <span>
                        <?php echo e($discount); ?>% discount applied
                    </span>

                    <button
                        wire:click="removeVoucher"
                        class="remove-voucher-btn"
                    >
                        Remove
                    </button>
                </div>

            
            <?php else: ?>

                <div class="voucher-header" wire:click="$toggle('showVoucher')">
                    <span class="voucher-toggle">Have a voucher code?</span>
                    <span class="voucher-symbol"><?php echo e($showVoucher ? '▲' : '▼'); ?></span>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showVoucher): ?>
                    <div class="voucher-body">
                        <input
                            type="text"
                            class="voucher-input"
                            placeholder="Enter your code"
                            wire:model.defer="voucherCode"
                        >

                        <button
                            class="apply-voucher-btn"
                            wire:click="applyVoucher"
                        >
                            Apply
                        </button>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="cart-summary">
            <div class="cart-cost">
                <p>Subtotal:</p>
                <p><?php echo e(number_format($this->subtotal, 2)); ?> lei</p>

                <p>Delivery:</p>
                <p><?php echo e(number_format($deliveryFee, 2)); ?> lei</p>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($appliedVoucher): ?>
                    <p>Discount:</p>
                    <p>- <?php echo e(number_format($this->discountAmount, 2)); ?> lei</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <hr class="hr-cart">

            <div class="cart-cost-total">
                <p class="cart-total">Total:</p>
                <p class="cart-total">
                    <?php echo e(number_format($this->finalTotal, 2)); ?> lei
                </p>
            </div>
            <div class="summary-buttons">
                <a href="<?php echo e(url('/')); ?>#menu">
                    <button class="add-more-btn">
                        Add More
                    </button>
                </a>
                <a href="<?php echo e(route('order.address')); ?>">
                    <button type="submit" class="checkout-btn">
                        Continue
                    </button>    
                </a>
            </div>
        </div>
    </div>
    <?php else: ?>
    <p class="empty-cart">Your cart is empty.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH /var/www/html/resources/views/livewire/cart.blade.php ENDPATH**/ ?>