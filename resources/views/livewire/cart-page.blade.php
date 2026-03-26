{{-- resources/views/livewire/cart-page.blade.php --}}
<div class="cart-page">
    <div class="cart-container">
        <h1 class="cart-title">Your Cart</h1>
        
        @if(empty($cartItems))
            <div class="empty-cart">
                <p>Your cart is empty</p>
                <a href="/menu" class="btn-servicii">Browse Menu</a>
            </div>
        @else
            <div class="cart-content">
                {{-- Left side - Cart items --}}
                <div class="cart-items">
                    @foreach($cartItems as $itemId => $item)
                        <div class="cart-item" wire:key="{{ $itemId }}">
                            <div class="cart-item-image">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                            </div>
                            
                            <div class="cart-item-details">
                                <h3>{{ $item['name'] }}</h3>
                                
                                @if($item['size'])
                                    <p class="item-size">Size: {{ ucfirst($item['size']) }}</p>
                                @endif
                                
                                @if(!empty($item['extraToppings']))
                                    <div class="item-toppings">
                                        <p>Extra Toppings:</p>
                                        <ul>
                                            @foreach($item['extraToppings'] as $topping)
                                                <li>{{ $topping['text'] }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <div class="item-price">
                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                </div>
                            </div>
                            
                            <div class="cart-item-controls">
                                <div class="quantity-controls">
                                    <button 
                                        class="qty-btn minus"
                                        wire:click="removeQuantity('{{ $itemId }}')"
                                    >
                                        −
                                    </button>
                                    
                                    <span class="qty-display">{{ $item['quantity'] }}</span>
                                    
                                    <button 
                                        class="qty-btn plus"
                                        wire:click="addQuantity('{{ $itemId }}')"
                                    >
                                        +
                                    </button>
                                </div>
                                
                                <button 
                                    class="remove-btn"
                                    wire:click="removeItem('{{ $itemId }}')"
                                >
                                    Remove
                                </button>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="cart-actions">
                        <button 
                            class="clear-cart-btn"
                            wire:click="clearCart"
                            wire:confirm="Are you sure you want to clear your cart?"
                        >
                            Clear Cart
                        </button>
                        <a href="/menu" class="continue-shopping">Continue Shopping</a>
                    </div>
                </div>
                
                {{-- Right side - Order summary --}}
                <div class="order-summary">
                    <h2>Order Summary</h2>
                    
                    <div class="summary-details">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>
                        
                        <div class="summary-row">
                            <span>Tax (10%)</span>
                            <span>${{ number_format($tax, 2) }}</span>
                        </div>
                        
                        <div class="summary-row">
                            <span>Delivery</span>
                            <span>
                                @if($shipping == 0)
                                    <span class="free-shipping">FREE</span>
                                @else
                                    ${{ number_format($shipping, 2) }}
                                @endif
                            </span>
                        </div>
                        
                        <div class="summary-divider"></div>
                        
                        <div class="summary-row total">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                    
                    <div class="delivery-note">
                        <p>🎉 Free delivery on orders over $50!</p>
                    </div>
                    
                    <div class="checkout-section">
                        <button class="checkout-btn" onclick="window.location.href='/checkout'">
                            Proceed to Checkout
                        </button>
                        
                        <div class="payment-methods">
                            <p>We accept:</p>
                            <div class="payment-icons">
                                <span>💳</span>
                                <span>📱</span>
                                <span>💰</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>