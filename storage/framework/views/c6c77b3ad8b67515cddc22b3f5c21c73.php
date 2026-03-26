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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="body-dashboard">
<?php echo $__env->make('livewire.nav-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   

    <section class="dashboard1">
        <div class="flex-sectiune-dashboard">
            <div class="left-bar">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <div class="flex-dashboard">
                        <img class="dashboard-icon" src="<?php echo e(asset('imagini/dashboard-layout_svgrepo.com.svg')); ?>" alt="dashboard-icon">
                        <p class="p-dashboard">Dashboard</p>
                    </div>
                </a>
                <div class="users-dropdown">
                    <a href="<?php echo e(route('users.index')); ?>">
                        <div class="flex-dashboard users-dropdown-trigger">
                            <img class="dashboard-icon" src="<?php echo e(asset('imagini/usersicon.svg')); ?>" alt="dashboard-icon">
                            <p class="p-dashboard">Users</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- RIGHT SIDE: CREATE USER FORM -->
            <div class="right-createuser">
                <h2 class="h2-dashboard">Create New User</h2>

                <div>
                    <form class="form-create-users" method="POST" action="<?php echo e(route('users.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="create-users-elements">
                            <!-- First Name -->
                            <div class="form-group">
                                <input type="text" id="first_name" name="first_name" class="input-sign-name" placeholder="First Name" value="<?php echo e(old('first_name')); ?>" required>
                            </div>
                            
                            <!-- Last Name -->
                            <div class="form-group">
                                <input type="text" id="last_name" name="last_name" class="input-sign-name" placeholder="Last Name" value="<?php echo e(old('last_name')); ?>" required>
                            </div>
                            
                            <!-- Email -->
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="input-sign-email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
                            </div>
                            
                            <!-- Password -->
                            <div class="form-group password-field">
                                <input type="password" id="password" name="password" class="input-sign-password" placeholder="Password" required>
                                <span class="toggle-password-createuser" onclick="togglePasswordVisibility('password')">
                                    <img src="<?php echo e(asset('imagini/Iconita-Ochi.svg')); ?>" class="eye-icon">
                                </span>
                            </div>
                            
                            <!-- Role Dropdown -->
                            <div class="custom-dropdown">
                                <div class="dropdown-selected" id="selectedRole">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role === 'manager'): ?>
                                        User
                                    <?php elseif(auth()->user()->role === 'admin'): ?>
                                        Select Role
                                    <?php else: ?>
                                        Role
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <ul class="dropdown-roles" id="roleList">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role === 'manager'): ?>
                                        <li data-value="user">User</li>
                                    <?php elseif(auth()->user()->role === 'admin'): ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = config('roles'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role !== 'client'): ?>
                                                <li data-value="<?php echo e($role); ?>"><?php echo e(ucfirst($role)); ?></li>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                                <input type="hidden" name="role" id="role" value="<?php echo e(auth()->user()->role === 'manager' ? 'user' : old('role')); ?>">
                            </div>

                            <button type="submit" class="btn-cancel2">Create User</button>
                            <button type="button" class="btn-cancel" onclick="window.location.href='<?php echo e(route('users.index')); ?>'">Cancel</button>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                            <div class="alert alert-error">
                                <ul>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
<script src="<?php echo e(asset('index.js')); ?>"></script>
</html>
<?php /**PATH /var/www/html/resources/views/createuser.blade.php ENDPATH**/ ?>