<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public array $cart = [];
    public bool $showVoucher = false;  
    public string $voucherCode = ''; 
    public float $deliveryFee = 12;
    public float $discount = 0; 
    public ?string $appliedVoucher = null;
    
    public array $selectedItems = [];
    public bool $selectAll = false;

    public function mount(): void
    {
        $this->cart = session()->get('cart', []);
    }

    public function increment(int $itemId): void
    {
        $this->cart[$itemId]['quantity']++;
        $this->sync();
    }

    public function decrement(int $itemId): void
    {
        if ($this->cart[$itemId]['quantity'] > 1) {
            $this->cart[$itemId]['quantity']--;
        } else {
            unset($this->cart[$itemId]);
        }

        $this->sync();
    }

    public function remove(int $itemId): void
    {
        unset($this->cart[$itemId]);
        $this->sync();
    }

    protected function sync(): void
    {
        session()->put('cart', $this->cart);
    }

    public function getSubtotalProperty(): float
    {
    return collect($this->cart)
        ->sum(fn ($item) => $item['price'] * $item['quantity']);
    }

    public function applyVoucher(): void
    {
        $code = trim($this->voucherCode);

        if (!$code) {
            session()->flash('voucherError', 'Please enter a voucher code.');
            return;
        }

        if ($code === 'DISCOUNT10') {
            $this->discount = 10;
            $this->appliedVoucher = 'DISCOUNT10';
            session()->flash('voucherSuccess', 'Voucher applied successfully!');
        } else {
            $this->discount = 0;
            $this->appliedVoucher = null;
            session()->flash('voucherError', 'Invalid or expired voucher code.');
            return;
        }

        // Close voucher input
        $this->voucherCode = '';
        $this->showVoucher = false;
    }

    public function removeVoucher(): void
    {
        $this->discount = 0;
        $this->appliedVoucher = null;
    }


    public function getDiscountAmountProperty(): float
    {
        return $this->subtotal * ($this->discount / 100);
    }

    public function getFinalTotalProperty(): float
    {
        return $this->subtotal 
            - $this->discountAmount 
            + $this->deliveryFee;
    }
    public function updatedSelectedItems(): void
{
    $this->selectAll = count($this->selectedItems) === count($this->cart);
}
    public function deleteSelected(): void
{
    foreach ($this->selectedItems as $itemId) {
        unset($this->cart[$itemId]);
    }

    $this->selectedItems = [];
    $this->selectAll = false;

    $this->sync();
}
public function updatedSelectAll($value): void
{
    if ($value) {
        $this->selectedItems = array_keys($this->cart);
    } else {
        $this->selectedItems = [];
    }
}


    public function render()
    {
        return view('livewire.cart');
    }
}
   