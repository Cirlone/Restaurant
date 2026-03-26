<div>
    
    <div class="div-searchmenu">
            <input
            type="text"
            placeholder="Search food..."
            wire:model.live.debounce.300ms="search"
            class="search-menu"
        >
</div>

        <div class="filter-menu-wrapper">
            <!-- Left arrow -->
            <button
                type="button"
                class="scroll-btn-left"
                onclick="scrollFilters(-200)"
            >
            <img src="imagini/sageata-stanga-meniu.svg">
            </button>

            <!-- Scrollable container -->
            <div id="filterMenu" class="filter-menu-buttons">

        <?php
            $categoryImages = [
                'pizza' => 'imagini/menu/pepperoni.svg',
                'pasta' => 'imagini/menu/paste milaneze.png',
                'dessert' => 'imagini/menu/desert2.svg',
                'grill' => 'imagini/menu/grill ceafa de porc.png',
                'drinks' => 'imagini/menu/7-2-sprite-png-clipart.png',
                'asian' => 'imagini/menu/asian sushi.png',
            ];
        ?>

        <!-- Then in your loop: -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['pizza', 'pasta', 'dessert', 'grill', 'drinks', 'asian']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button
                type="button"
                wire:click="toggleCategory('<?php echo e($category); ?>')"
                class="filter-menu-btn <?php echo e($selectedCategory === $category ? 'highlight active' : ''); ?>"
            >
                <img
                    src="<?php echo e(asset($categoryImages[$category])); ?>"
                    alt="<?php echo e(ucfirst($category)); ?>"
                    class="category-image2"
                >
                <?php echo e(ucfirst($category)); ?>

            </button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <!-- Right arrow -->
            <button
                type="button"
                class="scroll-btn-right"
                onclick="scrollFilters(200)"
            >
            <img src="imagini/sageata-dreapta-meniu.svg">
            </button>
        </div>


    
    <div class="container-servicii">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="casuta-servicii">
                <a href="/menu/item/<?php echo e($item['id']); ?>" class="block">
                <img
                    src="<?php echo e(asset($item['image'])); ?>"
                    alt="<?php echo e($item['name']); ?>"
                    class="poza-servicii"
                >
                </a>
                <a href="/menu/item/<?php echo e($item['id']); ?>" class="block">
                <h3 class="menu-item-name">
                    <?php echo e($item['name']); ?>

                </h3>
                </a>
                <div class="quantity-control">
                    <p class="p-casuta-servicii">
                    <?php echo e($item['total_price']); ?>

                    </p>
                    <div class="adauga-numar">
                        <p class="numar"><?php echo e($item['quantity']); ?></p>
                        <div class="plus-minus">
                            <p class="plus" wire:click="increment(<?php echo e($item['id']); ?>)">+</p>
                            <p class="minus" wire:click="decrement(<?php echo e($item['id']); ?>)">-</p>
                        </div>
                    </div>
                </div>
                 <button
                    class="btn-servicii"
                    type="button"
                    wire:click="addToCart(<?php echo e($item['id']); ?>)"
                >
                    Add to cart
                </button>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <p style="text-align:center; width:100%">
                No items found.
            </p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div><?php /**PATH /var/www/html/resources/views/livewire/menu-items.blade.php ENDPATH**/ ?>