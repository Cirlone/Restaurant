<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class AddToCartModal extends Component
{
    public bool $open = false;

    public string $name = '';
    public int $price = 0;
    public int $quantity = 1;
    public int $total = 0;

    #[On('item-added-to-cart')]
    public function show(array $item): void
    {
        $this->name = $item['name'];
        $this->price = $item['price'];
        $this->quantity = $item['quantity'];
        $this->total = $this->price * $this->quantity;
        $this->open = true;
    }

    public function close(): void
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.add-to-cart-modal');
    }
}