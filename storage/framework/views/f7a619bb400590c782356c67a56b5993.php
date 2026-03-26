<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Validation - Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>

<body>
    <header class="header">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navbar', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-952726690-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
<section class="newsletter-validation-page">
    <div class="validation-card">
        <div class="success-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        
        <h1>Successfully Subscribed!</h1>
        
        <p class="validation-message">
            Thank you for joining our newsletter! You'll now receive:
        </p>
        
        <div class="validation-email">
            <strong><?php echo e($email ?? 'your email'); ?></strong>
        </div>
        
        <div class="benefits-section">
            <div class="benefit-item">
                <span class="benefit-icon">🎉</span>
                <span class="benefit-text">Exclusive offers</span>
            </div>
            <div class="benefit-item">
                <span class="benefit-icon">🍽️</span>
                <span class="benefit-text">New menu alerts</span>
            </div>
            <div class="benefit-item">
                <span class="benefit-icon">🎂</span>
                <span class="benefit-text">Birthday specials</span>
            </div>
        </div>
        
        <div class="validation-actions">
            <a href="/" class="btn-return-home">
                <span></span> Return Home
            </a>
            <a href="/#menu" class="btn-browse-menu">
                <span></span> Browse Menu
            </a>
        </div>
    </div>
</section>
    <footer class="footer">
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="imagini/Icoana-Facebook-Desktop.svg" alt="poza instagram">
                <img class="poza-social" src="imagini/Icoana-Instagram-Desktop.svg" alt="poza facebook">
                <img class="poza-social" src="imagini/Icoana-Youtube-Desktop.svg" alt="poza twitter">
                <img class="poza-social" src="imagini/Icoana-X-Desktop.svg" alt="poza youtube">
            </div>
        </div>
    </footer>
</body>
<script src="index.js"></script>
</html>

<?php /**PATH /var/www/html/resources/views/Newsletter-Validation.blade.php ENDPATH**/ ?>