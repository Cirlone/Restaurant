<a href="{{ route('cart') }}" class="cart-icon-wrapper">
    <img
        src="{{ asset('imagini/icon-cart.svg') }}"
        class="poza-cart"
        alt="Cart"
    >

    @if($count > 0)
        <span class="cart-badge">
            {{ $count }}
        </span>
    @endif
</a>
