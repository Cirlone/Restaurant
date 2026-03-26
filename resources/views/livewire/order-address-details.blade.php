<div>

    <section class="sectiune-adrese" id="sectiune-adrese-order">

        {{-- ERRORS --}}
        @if($errors->any())
            <div class="order-error-box">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container-adrese">

            {{-- EXISTING ADDRESSES --}}
            <div class="youradress" id="youraddress-order">
                <h3 class="h3-youradress">SELECT ADDRESS</h3>

                @if(count($addresses) > 0)
                    @foreach($addresses as $address)
                        <div class="address-item">
                            <label>
                                <input type="radio"
                                       wire:model="selectedAddressId"
                                       value="{{ $address->id }}"
                                       wire:click="$set('useNewAddress', false)">

                                <p>{{ $address->street_address }}</p>
                                <p>{{ $address->city }}, {{ $address->state }} {{ $address->postal_code }}</p>
                                <p>{{ $address->country }}</p>
                            </label>
                        </div>
                    @endforeach
                @else
                    <p class="interval">No saved addresses</p>
                @endif
            </div>

            {{-- NEW ADDRESS FORM --}}
            <div class="formular-adrese" id="formular-adrese-order">
                <h3 class="h3-order-address">USE A DIFFERENT ADDRESS</h3>
                <h2 class="h2-form-order">
                    <label>
                        <input type="checkbox" wire:model.live="useNewAddress">
                        New Address
                    </label>
                </h2>

                @if($useNewAddress)
                    <form wire:submit.prevent="placeOrder" class="form-adrese">

                        <div class="row11">
                            <input type="text" wire:model="street_address" placeholder="Street address" class="input-field">
                        </div>
                        @error('street_address') <span class="error-message">{{ $message }}</span> @enderror

                        <div class="row22">
                            <input type="text" wire:model="city" placeholder="City" class="input-field">
                            <input type="text" wire:model="state" placeholder="State" class="input-field">
                        </div>
                        @error('city') <span class="error-message">{{ $message }}</span> @enderror
                        @error('state') <span class="error-message">{{ $message }}</span> @enderror

                        <div class="row33">
                            <input type="text" wire:model="postal_code" placeholder="Postal code" class="input-field">
                            <input type="text" wire:model="country" placeholder="Country" class="input-field">
                        </div>
                        @error('postal_code') <span class="error-message">{{ $message }}</span> @enderror
                        @error('country') <span class="error-message">{{ $message }}</span> @enderror

                    </form>
                @endif

            </div>
        </div>

        {{-- PHONE NUMBER --}}
        <div class="order-payment-method">
            <h3>PHONE NUMBER</h3>
            <div class="phone-field">
                <label class="phone-label" for="phone">Contact number for delivery</label>
                <input type="tel" id="phone" name="phone" wire:model="phone"
                    placeholder="+40 700 000 000" class="phone-input">
                @error('phone') <span class="error-message">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- PAYMENT METHOD --}}
        <div class="order-payment-method">
            <h3>PAYMENT METHOD</h3>

            <label>
                <input type="radio" wire:model.live="payment_method" value="card">
                Pay with Card
            </label>

            <label>
                <input type="radio" wire:model.live="payment_method" value="cash">
                Cash on Delivery
            </label>
        </div>

        {{-- FINAL BUTTON --}}
        <div>
            <button wire:click="placeOrder" class="btn-adrese" id="order-btn-payment">
                @if($payment_method === 'card')
                    Proceed to Payment
                @else
                    Place Order
                @endif
            </button>
        </div>

    </section>

</div>