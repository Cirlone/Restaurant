<div>
    {{-- Filters --}}
    <div class="div-searchmenu">
            <input
            type="text"
            placeholder="Search food..."
            wire:model.live.debounce.300ms="search"
            class="search-menu"
        >
</div>

        <div class="filter-menu-wrapper">
            <!-- Left arrow -->
            <button
                type="button"
                class="scroll-btn-left"
                onclick="scrollFilters(-200)"
            >
            <img src="imagini/sageata-stanga-meniu.svg">
            </button>

            <!-- Scrollable container -->
            <div id="filterMenu" class="filter-menu-buttons">

        @php
            $categoryImages = [
                'pizza' => 'imagini/menu/pepperoni.svg',
                'pasta' => 'imagini/menu/paste milaneze.png',
                'dessert' => 'imagini/menu/desert2.svg',
                'grill' => 'imagini/menu/grill ceafa de porc.png',
                'drinks' => 'imagini/menu/7-2-sprite-png-clipart.png',
                'asian' => 'imagini/menu/asian sushi.png',
            ];
        @endphp

        <!-- Then in your loop: -->
        @foreach (['pizza', 'pasta', 'dessert', 'grill', 'drinks', 'asian'] as $category)
            <button
                type="button"
                wire:click="toggleCategory('{{ $category }}')"
                class="filter-menu-btn {{ $selectedCategory === $category ? 'highlight active' : '' }}"
            >
                <img
                    src="{{ asset($categoryImages[$category]) }}"
                    alt="{{ ucfirst($category) }}"
                    class="category-image2"
                >
                {{ ucfirst($category) }}
            </button>
        @endforeach
            </div>

            <!-- Right arrow -->
            <button
                type="button"
                class="scroll-btn-right"
                onclick="scrollFilters(200)"
            >
            <img src="imagini/sageata-dreapta-meniu.svg">
            </button>
        </div>


    {{-- Menu Grid --}}
    <div class="container-servicii">
        @forelse($items as $item)
            <div class="casuta-servicii">
                <a href="/menu/item/{{$item['id'] }}" class="block">
                <img
                    src="{{ asset($item['image']) }}"
                    alt="{{ $item['name'] }}"
                    class="poza-servicii"
                >
                </a>
                <a href="/menu/item/{{$item['id'] }}" class="block">
                <h3 class="menu-item-name">
                    {{ $item['name'] }}
                </h3>
                </a>
                <div class="quantity-control">
                    <p class="p-casuta-servicii">
                    {{ $item['total_price'] }}
                    </p>
                    <div class="adauga-numar">
                        <p class="numar">{{ $item['quantity'] }}</p>
                        <div class="plus-minus">
                            <p class="plus" wire:click="increment({{ $item['id'] }})">+</p>
                            <p class="minus" wire:click="decrement({{ $item['id'] }})">-</p>
                        </div>
                    </div>
                </div>
                 <button
                    class="btn-servicii"
                    type="button"
                    wire:click="addToCart({{ $item['id'] }})"
                >
                    Add to cart
                </button>
            </div>
        @empty
            <p style="text-align:center; width:100%">
                No items found.
            </p>
        @endforelse
    </div>
</div>