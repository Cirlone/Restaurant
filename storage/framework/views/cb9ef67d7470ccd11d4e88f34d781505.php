<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Restaurant</title>
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
    <?php echo $__env->make('livewire.nav-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <section class="faq-page">
            <div class="faq-container">
                <h1 class="faq-title">Frequently Asked Questions</h1>
                <div class=flex-faq>
                    <div class="faq-image">
                        <img src="<?php echo e(asset('imagini/faq.svg')); ?>" alt="FAQ illustration">
                    </div>
                    <div class="faq-content">
                        <div class="faq-items">
                            <div class="faq-item">
                                <div class="faq-question" onclick="toggleFaq(this)">
                                    <span>What are your opening hours?</span>
                                    <span class="faq-arrow">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <p>We are open Monday-Sunday from 16:00 to 02:00. We're closed on Christmas Day and New Year's Eve.</p>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" onclick="toggleFaq(this)">
                                    <span>Do you offer delivery?</span>
                                    <span class="faq-arrow">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <p>Yes! We deliver within a 5km radius. Delivery fee is 10 lei for orders under 50 lei, and free for orders above 50 lei.</p>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" onclick="toggleFaq(this)">
                                    <span>Can I make a reservation?</span>
                                    <span class="faq-arrow">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <p>Absolutely! You can make reservations through our website using the reservation form in the Contact section, or by calling us at +40 123 456 789.</p>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" onclick="toggleFaq(this)">
                                    <span>Do you accommodate dietary restrictions?</span>
                                    <span class="faq-arrow">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <p>Yes, we offer vegetarian, vegan, and gluten-free options. Please inform your server about any allergies when ordering.</p>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" onclick="toggleFaq(this)">
                                    <span>What payment methods do you accept?</span>
                                    <span class="faq-arrow">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <p>We accept cash, all major credit cards, and online payments through our website.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
</body>
<script src="<?php echo e(asset('index.js')); ?>"></script>
</html><?php /**PATH /var/www/html/resources/views/livewire/faq.blade.php ENDPATH**/ ?>