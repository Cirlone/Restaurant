<div id="menu-item-page" class="menu-page">
    <div class="food-page">
        <div class="flex-poza-descriere">
            
            <div class="description-image">
                <img
                    src="<?php echo e(asset($item['image'])); ?>"
                    alt="<?php echo e($item['name']); ?>"
                >
            </div>
            <h2 class="h2-description">
                <?php echo e($item['name']); ?>

            </h2>
            <p class="p-description">
                <?php echo e($item['description']); ?>

            </p>          
        </div>

        
        <div class="food-description">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item['category'] == 'pizza'): ?>
                <div class="size-selection">
                    <h3 class="size-title">Select Size:</h3>
                    <div class="size-buttons">
                        <button 
                            type="button" 
                            class="size-btn"
                            data-size="small"
                            data-item-id="<?php echo e($item['id']); ?>"
                        >
                            Small
                        </button>
                        <button 
                            type="button" 
                            class="size-btn"
                            data-size="medium"
                            data-item-id="<?php echo e($item['id']); ?>"
                        >
                            Medium
                        </button>
                        <button 
                            type="button" 
                            class="size-btn"
                            data-size="large"
                            data-item-id="<?php echo e($item['id']); ?>"
                        >
                            Large
                        </button>
                    </div>
                </div>

                
                <div class="toppings-selection">
                    <h3 class="toppings-title">Add Extra Toppings:</h3>
                    
                    <div class="custom-multiselect">
                        
                        <div class="dropdown-trigger" 
                             id="toppingsTrigger_<?php echo e($item['id']); ?>"
                             data-item-id="<?php echo e($item['id']); ?>">
                            <span class="placeholder">Select extra toppings...</span>
                            <span class="arrow">▼</span>
                        </div>
                        
                        
                        <div class="dropdown-overlay" id="dropdownOverlay_<?php echo e($item['id']); ?>"></div>
                        
                        
                        <div class="dropdown-content"
                             id="toppingsDropdown_<?php echo e($item['id']); ?>">
                            
                            <div class="dropdown-section">
                                <h4 class="dropdown-section-title">Meats</h4>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="pepperoni" class="checkbox-input"> Pepperoni
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="sausage" class="checkbox-input"> Italian Sausage
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="spicy_sausage" class="checkbox-input"> Spicy Sausage
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="bacon" class="checkbox-input"> Bacon
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="ham" class="checkbox-input"> Ham
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="chicken" class="checkbox-input"> Grilled Chicken
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="bbq_chicken" class="checkbox-input"> BBQ Chicken
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="ground_beef" class="checkbox-input"> Ground Beef
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="salami" class="checkbox-input"> Salami
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="prosciutto" class="checkbox-input"> Prosciutto
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="anchovies" class="checkbox-input"> Anchovies
                                </label>
                            </div>
                            
                            
                            <div class="dropdown-section">
                                <h4 class="dropdown-section-title">Vegetables</h4>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="mushrooms" class="checkbox-input"> Mushrooms
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="onions" class="checkbox-input"> Onions
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="red_onions" class="checkbox-input"> Red Onions
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="bell_peppers" class="checkbox-input"> Bell Peppers
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="black_olives" class="checkbox-input"> Black Olives
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="tomatoes" class="checkbox-input"> Fresh Tomatoes
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="sun_dried_tomatoes" class="checkbox-input"> Sun-Dried Tomatoes
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="roasted_tomatoes" class="checkbox-input"> Roasted Tomatoes
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="spinach" class="checkbox-input"> Spinach
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="artichoke" class="checkbox-input"> Artichoke Hearts
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="garlic" class="checkbox-input"> Garlic
                                </label>
                            </div>
                            
                            
                            <div class="dropdown-section">
                                <h4 class="dropdown-section-title">Cheeses</h4>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="extra_cheese" class="checkbox-input"> Extra Mozzarella
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="parmesan" class="checkbox-input"> Parmesan
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="cheddar" class="checkbox-input"> Cheddar
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="goat_cheese" class="checkbox-input"> Goat Cheese
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="ricotta" class="checkbox-input"> Ricotta
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="gorgonzola" class="checkbox-input"> Gorgonzola
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="feta" class="checkbox-input"> Feta
                                </label>
                            </div>
                            
                            
                            <div class="dropdown-section">
                                <h4 class="dropdown-section-title">Fruits & Herbs</h4>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="pineapple" class="checkbox-input"> Pineapple
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="figs" class="checkbox-input"> Figs
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="basil" class="checkbox-input"> Fresh Basil
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="oregano" class="checkbox-input"> Oregano
                                </label>
                                <label class="dropdown-option">
                                    <input type="checkbox" value="rosemary" class="checkbox-input"> Rosemary
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="selected-toppings-container">
                        <div id="selectedToppings_<?php echo e($item['id']); ?>" class="selected-toppings">
                            <span class="placeholder-text">No extra toppings selected</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> 

            
            <div class="cart-action">
                <button 
                    id="addToCartBtn_<?php echo e($item['id']); ?>"
                    class="add-to-cart-btn"
                    data-item-id="<?php echo e($item['id']); ?>"
                    data-category="<?php echo e($item['category']); ?>"
                    disabled
                >
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/html/resources/views/livewire/menu-item-show.blade.php ENDPATH**/ ?>