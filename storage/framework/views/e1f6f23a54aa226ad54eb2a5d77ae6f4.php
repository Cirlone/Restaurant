<footer class="footer">
        <div class="newsletter">
            <h3 class="h3-newsletter">Newsletter</h3>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('newsletter-form');

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2567454051-0', $__key);

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
        </div>
         <div class="faq-link">
            <p class="faq-text">More questions? <a href="<?php echo e(route('faq')); ?>" class="faq-link-text">Check our FAQ page</a></p>
        </div>
    </div>
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="imagini/Icoana-Facebook-Desktop.svg" alt="poza instagram">
                <img class="poza-social" src="imagini/Icoana-Instagram-Desktop.svg" alt="poza facebook">
                <img class="poza-social" src="imagini/Icoana-Youtube-Desktop.svg" alt="poza twitter">
                <img class="poza-social" src="imagini/Icoana-X-Desktop.svg" alt="poza youtube">
            </div>
        </div>
    </footer><?php /**PATH /var/www/html/resources/views/livewire/footer.blade.php ENDPATH**/ ?>