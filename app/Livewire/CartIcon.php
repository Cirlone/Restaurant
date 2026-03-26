<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CartIcon extends Component
{
    public int $count = 0;

    public function mount(): void
    {
        $this->updateCount();
    }

    #[On('cart-updated')]
    public function updateCount(): void
    {
        $this->count = collect(session('cart', []))
            ->sum('quantity');
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}