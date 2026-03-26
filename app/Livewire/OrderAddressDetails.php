<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address;

class OrderAddressDetails extends Component
{
    public $addresses;
    public $selectedAddressId = null;

    public $payment_method = 'card';

    public $useNewAddress = false;

    public $street_address = '';
    public $city = '';
    public $state = '';
    public $postal_code = '';
    public $country = '';

    public function mount()
    {
        $this->addresses = auth()->user()
            ->addresses()
            ->latest()
            ->get();

        $this->selectedAddressId = $this->addresses->first()?->id;
    }

    public function placeOrder()
    {
        if ($this->useNewAddress) {
            $this->validate([
                'street_address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'postal_code' => 'required',
                'country' => 'required',
            ]);

            $address = auth()->user()->addresses()->create([
                'street_address' => $this->street_address,
                'city' => $this->city,
                'state' => $this->state,
                'postal_code' => $this->postal_code,
                'country' => $this->country,
            ]);
        } else {
            $this->validate([
                'selectedAddressId' => 'required|exists:addresses,id',
            ]);

            $address = auth()->user()
                ->addresses()
                ->findOrFail($this->selectedAddressId);
        }

        // create order BEFORE redirect
        $order = auth()->user()->orders()->create([
            'address_id' => $address->id,
            'payment_method' => $this->payment_method,
            'status' => 'pending',
        ]);

        if ($this->payment_method === 'card') {
            session(['pending_order' => [
                'address_id' => $address->id,
                'payment_method' => $this->payment_method,
            ]]);
            return redirect()->route('checkout.create');
        }

        // cash on delivery
        auth()->user()->orders()->create([
            'address_id' => $address->id,
            'payment_method' => $this->payment_method,
            'status' => 'pending',
        ]);
        return redirect()->route('order.success');
    }

    public function render()
    {
        return view('livewire.order-address-details');
    }
}