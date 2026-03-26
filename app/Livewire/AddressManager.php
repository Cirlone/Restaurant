<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address;

class AddressManager extends Component
{
    public $addresses = [];
    public $street_address = '';
    public $city = '';
    public $state = '';  // Add this
    public $postal_code = '';
    public $country = '';

    public function mount()
    {
        $this->loadAddresses();
    }

    public function loadAddresses()
    {
        $this->addresses = auth()->user()->addresses()->latest()->get()->toArray();
    }

    public function save()
    {
        $this->validate([
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',  // Add this
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ]);

        auth()->user()->addresses()->create([
            'street_address' => $this->street_address,
            'city' => $this->city,
            'state' => $this->state,  // Add this
            'postal_code' => $this->postal_code,
            'country' => $this->country,
        ]);

        $this->reset(['street_address', 'city', 'state', 'postal_code', 'country']);
        $this->loadAddresses();
        session()->flash('message', 'Address added!');
    }

    public function delete($id)
    {
        $address = auth()->user()->addresses()->findOrFail($id);
        $address->delete();
        $this->loadAddresses();
        session()->flash('message', 'Address deleted!');
    }

    public function render()
    {
        return view('livewire.address-manager');
    }
}