<div class="cart-container">
    <h2 class="h2-cart">MY CART</h2>

    @if(count($cart) > 0)
    <div class="cart-table-container">

        <table class="cart-table">
            <thead class="cart-thead">
                <tr>
                    <th class="cart-th">
                        <div class="cart-header-left">
                            <input
                                type="checkbox"
                                wire:model.live="selectAll"
                            >
                            <p>Select all</p>
                        </div>

                        @if(count($selectedItems) > 0)
                            <button class="btn-delete-selected" wire:click="deleteSelected">
                                Delete Selected ({{ count($selectedItems) }})
                            </button>
                        @endif
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr class="cart-item-row" wire:key="{{ $item['id'] }}">
                    <td class="cart-product-img">
                        <img class="cart-img" src="{{ asset($item['image']) }}" width="60" alt="{{ $item['name'] }}">
                    </td>
                    <td class="cart-product-price">
                        <div>
                            <strong>{{ $item['name'] }}</strong>
                            <p>{{ $item['price'] }} lei</p>
                        </div>
                        <input class="cart-item-checkbox"
                            type="checkbox"
                            value="{{ $item['id'] }}"
                            wire:model.live="selectedItems"
                        >
                        <button class="cart-remove-btn remove-absolute"
                            wire:click="remove({{ $item['id'] }})">
                            <img src="imagini/trash-bin.svg">
                        </button>
                   </td>
                    <td class="cart-quantity-control">
                        <button class="btn-plus-minus" wire:click="decrement({{ $item['id'] }})">-</button>
                        <span class="cart-item-quantity">{{ $item['quantity'] }}</span>
                        <button class="btn-plus-minus" wire:click="increment({{ $item['id'] }})">+</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="voucher">
            {{-- If voucher is applied --}}
            @if($appliedVoucher)

                <div class="voucher-header">
                    <span>
                        {{ $discount }}% discount applied
                    </span>

                    <button
                        wire:click="removeVoucher"
                        class="remove-voucher-btn"
                    >
                        Remove
                    </button>
                </div>

            {{-- If no voucher applied --}}
            @else

                <div class="voucher-header" wire:click="$toggle('showVoucher')">
                    <span class="voucher-toggle">Have a voucher code?</span>
                    <span class="voucher-symbol">{{ $showVoucher ? '▲' : '▼' }}</span>
                </div>

                @if($showVoucher)
                    <div class="voucher-body">
                        <input
                            type="text"
                            class="voucher-input"
                            placeholder="Enter your code"
                            wire:model.defer="voucherCode"
                        >

                        <button
                            class="apply-voucher-btn"
                            wire:click="applyVoucher"
                        >
                            Apply
                        </button>
                    </div>
                @endif
            @endif
        </div>

        <div class="cart-summary">
            <div class="cart-cost">
                <p>Subtotal:</p>
                <p>{{ number_format($this->subtotal, 2) }} lei</p>

                <p>Delivery:</p>
                <p>{{ number_format($deliveryFee, 2) }} lei</p>

                @if($appliedVoucher)
                    <p>Discount:</p>
                    <p>- {{ number_format($this->discountAmount, 2) }} lei</p>
                @endif
            </div>

            <hr class="hr-cart">

            <div class="cart-cost-total">
                <p class="cart-total">Total:</p>
                <p class="cart-total">
                    {{ number_format($this->finalTotal, 2) }} lei
                </p>
            </div>
            <div class="summary-buttons">
                <a href="{{ url('/') }}#menu">
                    <button class="add-more-btn">
                        Add More
                    </button>
                </a>
                <a href="{{ route('order.address') }}">
                    <button type="submit" class="checkout-btn">
                        Continue
                    </button>    
                </a>
            </div>
        </div>
    </div>
    @else
    <p class="empty-cart">Your cart is empty.</p>
    @endif
</div>