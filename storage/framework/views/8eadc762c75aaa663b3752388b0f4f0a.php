<div>
    <?php
        $current = $users->currentPage();
        $last = $users->lastPage();
        $start = max(1, $current - 2);
        $end = min($last, $current + 2);
        $currentUser = auth()->user();
        $isManager = $currentUser->role === 'manager';
    ?>

    
    <input
        type="text"
        class="input-usersearch"
        placeholder="Search users..."
        wire:model.live.debounce.300ms="search"
    >

    
    <div class="filter-tab">
        <p class="filter-tag">Filters:</p>
            <div class="tabs">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = config('roles'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!($isManager && in_array($role, ['admin', 'manager']))): ?>
                <button type="button" wire:click="toggleRole('<?php echo e($role); ?>')" class="btn-sign role-filter <?php echo e($selectedRole === $role ? 'highlight active' : ''); ?>" id="user-btn-tabs">
                    <?php echo e(ucfirst(str_replace('_', ' ', $role))); ?>

                </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
    </div>

    
    <div class="table-scroll" x-data="{ isDown: false, startX: 0, scrollLeft: 0 }"
        @mousedown="isDown = true; startX = $event.pageX; scrollLeft = $el.scrollLeft"
        @mouseup="isDown = false"
        @mouseleave="isDown = false"
        @mousemove="
        if (!isDown) return;
        $el.scrollLeft = scrollLeft - ($event.pageX - startX);">
        <table class="down">
            <tbody class="users-table-tbody">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="users-table-tr" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'user-'.e($user->id).''; ?>wire:key="user-<?php echo e($user->id); ?>">
                        <td class="users-table-td" data-label="ID">#<?php echo e($user->id); ?></td>
                        <td class="users-table-td" data-label="First Name"><?php echo e($user->first_name); ?></td>
                        <td class="users-table-td" data-label="Last Name"><?php echo e($user->last_name); ?></td>
                        <td class="users-table-td" data-label="Email"><?php echo e($user->email); ?></td>
                        <td class="users-table-td" data-label="Updated"><?php echo e($user->updated_at->format('d.m.Y')); ?></td>

                        
                        <td data-label="Actions" class="make-delete">
                        <div class="users-parent">
                            <div x-data="{ 
                                        open: false, 
                                        isLastRow: <?php echo e($loop->last ? 'true' : 'false'); ?>,
                                        showAlert: false,
                                        alertText: ''
                                    }" 
                                    @role-updated.window="
                                        if ($event.detail.userId === <?php echo e($user->id); ?>) {
                                            alertText = 'Role updated';
                                            showAlert = true;
                                            setTimeout(() => showAlert = false, 4000);
                                        }
                                    "
                                    @role-error.window="
                                        if ($event.detail.userId === <?php echo e($user->id); ?>) {
                                            alertText = $event.detail.message;
                                            showAlert = true;
                                            setTimeout(() => showAlert = false, 4000);
                                        }
                                    "
                                    class="dropdown-wrapper">
                                <div class="dropdown-selected-users" @click="open = !open">
                                    <?php echo e(ucfirst(str_replace('_', ' ', $user->role ?? 'Select role'))); ?>

                                </div>
                                <ul x-show="open" 
                                    x-transition 
                                    :class="{ 'dropdown-up': isLastRow }"
                                    @click.outside="open = false">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = config('roles'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!($isManager && in_array($role, ['admin', 'manager']))): ?>
                                            <li
                                                <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'role-'.e($user->id).'-'.e($role).''; ?>wire:key="role-<?php echo e($user->id); ?>-<?php echo e($role); ?>"
                                                class="role-item <?php echo e($user->role === $role ? 'active' : ''); ?>"
                                                x-on:click.stop.prevent="
                                                    Livewire.find($el.closest('[wire\\:id]').getAttribute('wire:id'))
                                                        .call('updateUserRole', <?php echo e($user->id); ?>, '<?php echo e($role); ?>');
                                                    open = false;">
                                                <?php echo e(ucfirst(str_replace('_', ' ', $role))); ?>

                                            </li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </ul> 
                                <span>
                                    <div
                                        x-show="showAlert"
                                        x-transition
                                        class="role-alert"
                                        x-text="alertText"
                                    ></div>
                            </span>
                            </div>

                            
                            <form
                                class="form-users"
                                method="POST"
                                action="<?php echo e(route('users.destroy', $user)); ?>"
                            >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    class="btn-delete"
                                    type="submit"
                                    onclick="return confirm('Delete user <?php echo e($user->first_name); ?><?php echo e($user->last_name); ?>?')">
                                
                                    Delete
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr class="users-table-tr">
                        <td colspan="5">No users found.</td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="pagination-wrapper">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($users->onFirstPage()): ?>
            <span class="page disabled">«</span>
        <?php else: ?>
            <button wire:click="previousPage" class="page">«</button>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($page = $start; $page <= $end; $page++): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page === $current): ?>
                <span class="page active"><?php echo e($page); ?></span>
            <?php else: ?>
                <button wire:click="gotoPage(<?php echo e($page); ?>)" class="page">
                    <?php echo e($page); ?>

                </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($users->hasMorePages()): ?>
            <button wire:click="nextPage" class="page">»</button>
        <?php else: ?>
            <span class="page disabled">»</span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

</div><?php /**PATH /var/www/html/resources/views/livewire/users-table.blade.php ENDPATH**/ ?>