<div>
    <div class="category-header">
        <h2 class="h2-dashboard">Categories</h2>
        <button wire:click="create" class="btn-create-category">
            New Category
        </button>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('message')): ?>
        <div class="alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showForm): ?>
        <div class="category-form">
            <h3><?php echo e($editingId ? 'Edit Category' : 'Add New Category'); ?></h3>
            
            <form wire:submit="save">
                <div class="form-group" id="form-group-category">
                    <label>Name (for URL slug)</label>
                    <input type="text" wire:model="name" class="form-input">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error-message"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="form-group" id="form-group-category">
                    <label>Display Name</label>
                    <input type="text" wire:model="display_name" class="form-input">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error-message"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="form-group" id="form-group-category">
                    <label>Description</label>
                    <textarea wire:model="description" class="form-input" rows="3"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group" id="form-group-category">
                        <label>Sort Order</label>
                        <input type="number" wire:model="sort_order" class="form-input sort-order-input">
                    </div>

                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" wire:model="is_active">
                            Active
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" wire:click="$set('showForm', false)" class="btn-cancel">
                        Cancel
                    </button>
                    <button type="submit" class="btn-save">
                        <?php echo e($editingId ? 'Update' : 'Save'); ?>

                    </button>
                </div>
            </form>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="table-scroll">
    <table class="categories-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr>
                    <td><?php echo e($category->sort_order); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->display_name); ?></td>
                    <td>
                        <button wire:click="toggleActive(<?php echo e($category->id); ?>)" 
                                class="status-badge <?php echo e($category->is_active ? 'active' : 'inactive'); ?>">
                            <?php echo e($category->is_active ? 'Active' : 'Inactive'); ?>

                        </button>
                    </td>
                    <td>
                        <button wire:click="edit(<?php echo e($category->id); ?>)" class="edit-text-btn">
                            Edit
                        </button>
                        <button wire:click="delete(<?php echo e($category->id); ?>)" 
                                onclick="return confirm('Delete this category?')" 
                                class="delete-text-btn">
                            Delete
                        </button>
                    </td>
                </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </tbody>
    </table>
</div>

    <div class="pagination-wrapper">
        <?php echo e($categories->links()); ?>

    </div>
</div><?php /**PATH /var/www/html/resources/views/livewire/category-manager.blade.php ENDPATH**/ ?>