<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class MenuItems extends Component
{
    public ?string $selectedCategory = null;
    public string $search = '';
    public array $quantities = [];

    public function mount(): void
    {
        $this->loadQuantities();
    }

    public function loadQuantities(): void
    {
        $items = $this->getMenuItems();
        foreach ($items as $item) {
            $this->quantities[$item->id] = 1;
        }
    }

    protected function getMenuItems()
    {
        $query = MenuItem::where('is_available', true)
            ->with('category')
            ->orderBy('sort_order');

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->selectedCategory) {
            $query->whereHas('category', function ($q) {
                $q->where('name', $this->selectedCategory);
            });
        }

        return $query->get();
    }

    public function increment(int $itemId): void
    {
        $this->quantities[$itemId] = ($this->quantities[$itemId] ?? 1) + 1;
    }

    public function decrement(int $itemId): void
    {
        if (($this->quantities[$itemId] ?? 1) > 1) {
            $this->quantities[$itemId]--;
        }
    }

    public function getItemsWithQuantitiesProperty(): Collection
    {
        return $this->getMenuItems()->map(function ($item) {
            $quantity = $this->quantities[$item->id] ?? 1;
            $totalPrice = $item->base_price * $quantity;
            
            return [
                'id' => $item->id,
                'name' => $item->name,
                'category' => $item->category->name ?? '',
                'image' => $item->image ? asset('storage/' . $item->image) : asset('imagini/menu/placeholder.svg'),
                'base_price' => $item->base_price,
                'description' => $item->description,
                'quantity' => $quantity,
                'total_price' => $totalPrice . ' lei'
            ];
        });
    }

    public function toggleCategory(string $category): void
    {
        $this->selectedCategory = $this->selectedCategory === $category ? null : $category;
        $this->loadQuantities();
    }

    public function clearFilters(): void
    {
        $this->selectedCategory = null;
        $this->search = '';
        $this->loadQuantities();
    }

    public function addToCart(int $itemId): void
    {
        $user = auth()->user();

        if (!$user || !$user->isClient()) {
            session()->flash('error', 'Please switch to a client account to add items to the cart.');
            return; // stops here, nothing gets added
        }
        $item = MenuItem::with('category')->find($itemId);

        if (!$item) {
            return;
        }

        $quantity = $this->quantities[$itemId] ?? 1;

        $cart = session()->get('cart', []);

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] += $quantity;
        } else {
            $cart[$itemId] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->base_price,
                'quantity' => $quantity,
                'image' => $item->image ? asset('storage/' . $item->image) : asset('imagini/menu/placeholder.svg'),
                'category' => $item->category->name ?? '',
            ];
        }

        session()->put('cart', $cart);

        $this->dispatch('cart-updated');
        $this->dispatch('item-added-to-cart', [
            'name' => $item->name,
            'price' => $item->base_price,
            'quantity' => $quantity,
        ]);
    }

    public function render()
    {
        return view('livewire.menu-items', [
            'items' => $this->itemsWithQuantities,
        ]);
    }
}