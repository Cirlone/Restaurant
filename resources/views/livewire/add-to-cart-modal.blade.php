<div>
    @if($open)
        <div class="modal-cart-backdrop">
            <div class="modal-cart-box">
                <button class="modal-cart-close" wire:click="close">✕</button>

                <h3 class="h3-modal-cart">Item added to cart</h3>

                <div class="grid-modal-cart">
                    <p class="modal-cart-name">
                        <strong>Name:</strong>
                    </p>
                    <p class="modal-cart-name">
                        <strong>{{ $name }}</strong>
                    </p>

                    <p class="modal-cart-price">
                        <strong>Price:</strong>
                    </p>
                    <p class="modal-cart-price">
                        <strong>{{ $price }} lei</strong>
                    </p>

                    <p class="modal-cart-quantity">
                        <strong>Quantity:</strong>
                    </p>
                    <p class="modal-cart-quantity">
                        <strong>{{ $quantity }}</strong>
                    </p>
                </div>
                
                <hr class="hr-modal-cart">

                <div class="grid-modal-cart">
                    <p class="modal-cart-total">
                        <strong>Total:</strong>
                    </p>
                    <p class="modal-cart-total">
                        <strong>{{ $total }} lei</strong>
                    </p>
                </div>

                <div class="modal-cart-actions">
                    <button wire:click="close" class="btn-continue-shopping">
                        Continue shopping
                    </button>

                    <a href="{{ route('cart') }}">
                        <button class="btn-cart-details">
                            Cart details
                        </button>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>