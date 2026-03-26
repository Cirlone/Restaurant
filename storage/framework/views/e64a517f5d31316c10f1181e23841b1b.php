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
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
<nav class="nav">
    <div class="poza-logo">
        <a href="/"><img src="<?php echo e(asset('imagini/Logo-Restaurant.svg')); ?>" alt="poza logo"></a>
    </div>
    <div class="nav-container">
        <ul class="nav-items">
            <li><a class="nav-element" href='/'>HOME</a></li>
        </ul>
        <div class="butoane-log">
            <button class="btn-sign" id="signButton" type="button">Sign in</button>
            <button class="btn-log" id="logButton" type="button">Log in</button>
        </div>
    </div>
</nav>

<div class="Sign-In-Page">
    <div class="formular-sign">
        <div class="flex-already">
            <a href="<?php echo e(route('login')); ?>"><p>Already have an account?</p></a>
        </div>

        <form class="form-sign" action="<?php echo e(route('register.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- Name -->
           <div class="row1-sign">
                <input class="input-sign" type="text" placeholder="First Name" name="first_name" value="<?php echo e(old('first_name')); ?>" required>
                <input class="input-sign" type="text" placeholder="Last Name" name="last_name"value="<?php echo e(old('last_name')); ?>" required>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Email -->
            <div class="row2-sign">
                <input class="input-sign-email" type="email" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Password -->
            <div class="row3-sign">
                <input class="input-password" type="password" placeholder="Password" name="password" id="Password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('Password')">
                    <img src="<?php echo e(asset('imagini/Iconita-Ochi.svg')); ?>" alt="Toggle Password" class="eye-icon">
                </span>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Confirm Password -->
            <div class="row4-sign">
                <input class="input-sign-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" id="confirmPassword" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('confirmPassword')">
                    <img src="<?php echo e(asset('imagini/Iconita-Ochi.svg')); ?>" alt="Toggle Password" class="eye-icon">
                </span>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Terms -->
            <div class="checkbox">
                <input type="checkbox" class="check" id="terms" name="terms" value="check" required>
                <label for="terms">
                    I agree to the
                    <a href="<?php echo e(route('terms.show')); ?>" target="_blank">Terms of Service</a>
                    and
                    <a href="<?php echo e(route('policy.show')); ?>" target="_blank">Privacy Policy</a>.
                </label>
            </div>

            <button class="btn-sign-in" type="submit">Create account</button>
        </form>

        <p class="or">Or sign in with</p>
        <div class="butoane-create-account">
            <button class="btn-google" type="button" onclick="window.location='<?php echo e(route('google.redirect')); ?>'">
                <img src="<?php echo e(asset('imagini/Iconita-Google.svg')); ?>" alt="Google Icon" class="btn-icon"> <p>Google</p>
            </button>
            <button class="btn-facebook" type="button" onclick="window.location='<?php echo e(route('facebook.redirect')); ?>'">
                <img src="<?php echo e(asset('imagini/Iconita-Facebook.svg')); ?>" alt="Facebook Icon" class="btn-icon"> <p>Facebook</p>
            </button>
        </div>
    </div>
</div>

<footer class="footer1">
    <div class="social-media">
        <div class="social">
            <img class="poza-social" src="<?php echo e(asset('imagini/Icoana-Facebook-Desktop.svg')); ?>" alt="facebook">
            <img class="poza-social" src="<?php echo e(asset('imagini/Icoana-Instagram-Desktop.svg')); ?>" alt="instagram">
            <img class="poza-social" src="<?php echo e(asset('imagini/Icoana-Youtube-Desktop.svg')); ?>" alt="youtube">
            <img class="poza-social" src="<?php echo e(asset('imagini/Icoana-X-Desktop.svg')); ?>" alt="x">
        </div>
    </div>
</footer>

<script>
    window.routes = {
    login: "<?php echo e(route('login')); ?>",
    register: "<?php echo e(route('register')); ?>"
};
</script>
<script src="<?php echo e(asset('index.js')); ?>"></script>
</html><?php /**PATH /var/www/html/resources/views/auth/register.blade.php ENDPATH**/ ?>