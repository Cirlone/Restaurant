<div class="container-reviews">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index % 2 == 0): ?>
            <div class="review-stanga">
                <div class="mesaj-stanga">
                    <img class="stele-stanga" src="<?php echo e(asset('imagini/Stele.svg')); ?>" alt="rating">
                    <p class="p-stanga"><?php echo e(Str::limit($review['text'], 100)); ?></p>
                    <h3 class="h3-reviews-stanga"><?php echo e($review['author_name']); ?></h3>
                </div>
                <div class="img-stanga">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($review['profile_photo_url'])): ?>
                        <img class="poza-fata" src="<?php echo e($review['profile_photo_url']); ?>" alt="<?php echo e($review['author_name']); ?>">
                    <?php else: ?>
                        <img class="poza-fata" src="<?php echo e(asset('imagini/poza-fata.svg')); ?>" alt="reviewer">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="review-dreapta">
                <div class="mesaj-dreapta">
                    <img class="stele-dreapta" src="<?php echo e(asset('imagini/Stele.svg')); ?>" alt="rating">
                    <p class="p-dreapta"><?php echo e(Str::limit($review['text'], 100)); ?></p>
                    <h3 class="h3-reviews-dreapta"><?php echo e($review['author_name']); ?></h3>
                </div>
                <div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($review['profile_photo_url'])): ?>
                        <img class="poza-barbat" src="<?php echo e($review['profile_photo_url']); ?>" alt="<?php echo e($review['author_name']); ?>">
                    <?php else: ?>
                        <img class="poza-barbat" src="<?php echo e(asset('imagini/poza-barbat.svg')); ?>" alt="reviewer">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <!-- Fallback static reviews -->
        <div class="review-stanga">
            <div class="mesaj-stanga">
                <img class="stele-stanga" src="<?php echo e(asset('imagini/Stele.svg')); ?>" alt="poza stele">
                <p class="p-stanga">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <h3 class="h3-reviews-stanga">Jessica Blue</h3>
            </div>
            <div class="img-stanga">
                <img class="poza-fata" src="<?php echo e(asset('imagini/poza-fata.svg')); ?>" alt="poza fata">
            </div>
        </div>
        <div class="review-dreapta">
            <div class="mesaj-dreapta">
                <img class="stele-dreapta" src="<?php echo e(asset('imagini/Stele.svg')); ?>" alt="poza stele">
                <p class="p-dreapta">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <h3 class="h3-reviews-dreapta">Michael Towers</h3>
            </div>
            <div>
                <img class="poza-barbat" src="<?php echo e(asset('imagini/poza-barbat.svg')); ?>" alt="poza fata">
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH /var/www/html/resources/views/livewire/google-reviews.blade.php ENDPATH**/ ?>