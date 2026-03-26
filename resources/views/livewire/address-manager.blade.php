<section class="sectiune-adrese">
    @if($errors->any())
    <div style="background: red; color: white; padding: 10px; margin-bottom: 10px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="container-adrese">
        <div class="youradress">
            <h3 class="h3-youradress">YOUR ADDRESSES</h3>
            @if(session()->has('message'))
                <p class="interval">{{ session('message') }}</p>
            @endif
            @if(count($addresses) > 0)
                @foreach($addresses as $address)
                    <div class="address-item">
                        <p>{{ $address['street_address'] }}</p>
                        <p>{{ $address['city'] }}, {{ $address['state'] }} {{ $address['postal_code'] }}</p>
                        <p>{{ $address['country'] }}</p>
                        <button wire:click="delete({{ $address['id'] }})" 
                                onclick="return confirm('Delete this address?')"
                                class="delete-address-btn">
                            Delete
                        </button>
                    </div>
                @endforeach
            @else
                <p class="interval">No addresses yet</p>
            @endif
        </div>

        <div class="formular-adrese">
            <h3 class="h3-form">Add New Address</h3>
            <form wire:submit="save" class="form-adrese">
                <div class="row11">
                    <input type="text" wire:model="street_address" placeholder="Street address" class="input-field" required>
                </div>
                @error('street_address') <span class="error-message">{{ $message }}</span> @enderror

                <div class="row22">
                    <input type="text" wire:model="city" placeholder="City" class="input-field" required>
                    <input type="text" wire:model="state" placeholder="State" class="input-field" required>
                </div>
                @error('city') <span class="error-message">{{ $message }}</span> @enderror
                @error('state') <span class="error-message">{{ $message }}</span> @enderror

                <div class="row33">
                    <input type="text" wire:model="postal_code" placeholder="Postal code" class="input-field" required>
                    <input type="text" wire:model="country" placeholder="Country" class="input-field" required>
                </div>
                @error('postal_code') <span class="error-message">{{ $message }}</span> @enderror
                @error('country') <span class="error-message">{{ $message }}</span> @enderror

                <button type="submit" class="btn-adrese">Add Address</button>
            </form>
        </div>
    </div>
</section>