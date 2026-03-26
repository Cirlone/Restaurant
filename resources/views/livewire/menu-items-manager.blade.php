<div class="menu-manager-container">
    {{-- Header --}}
    <div class="manager-header">
        <h2 class="manager-title">Menu Items</h2>
        <button wire:click="create" class="manager-create-btn">
            + New Menu Item
        </button>
    </div>

    @if(session()->has('message'))
        <div class="manager-alert">
            {{ session('message') }}
        </div>
    @endif

    {{-- Create/Edit Form --}}
    @if($showForm)
        <div class="manager-form-card">
            <h3 class="form-card-title">{{ $editingId ? 'Edit Menu Item' : 'Add New Menu Item' }}</h3>
            
            <form wire:submit="save" enctype="multipart/form-data">
                <div class="form-field">
                    <label class="field-label">Name</label>
                    <input type="text" wire:model="name" class="text-input">
                    @error('name') <span class="field-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-field">
                    <label class="field-label">Description</label>
                    <textarea wire:model="description" class="text-input" rows="3"></textarea>
                    @error('description') <span class="field-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-row">
                    <div class="form-field half-width">
                        <label class="field-label">Base Price (lei)</label>
                        <input type="number" wire:model="base_price" class="text-input price-input" step="0.01">
                        @error('base_price') <span class="field-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-field half-width">
                        <label class="field-label">Sort Order</label>
                        <input type="number" wire:model="sort_order" class="text-input sort-input">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field half-width">
                        <label class="field-label">Category</label>
                        <select wire:model="category_id" class="text-input">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->display_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="field-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="checkbox-wrapper">
                        <label class="checkbox-label">
                            <input type="checkbox" wire:model="is_available" class="checkbox-input">
                            <span class="checkbox-text">Available</span>
                        </label>
                    </div>
                </div>

                <div class="form-field">
                    <label class="field-label">Image</label>
                    <input type="file" wire:model="image" class="file-upload" accept="image/*">
                    @error('image') <span class="field-error">{{ $message }}</span> @enderror
                    @if($image)
                        <div class="image-preview-box">
                            <img src="{{ $image->temporaryUrl() }}" class="preview-thumb">
                        </div>
                    @endif
                </div>

                <div class="form-actions">
                    <button type="button" wire:click="$set('showForm', false)" class="cancel-btn">
                        Cancel
                    </button>
                    <button type="submit" class="save-btn">
                        {{ $editingId ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    @endif

    {{-- Search and Filter Section --}}
    <div class="filter-section">
        <div class="search-wrapper">
            <input
                type="text"
                placeholder="Search food..."
                wire:model.live.debounce.300ms="search"
                class="search-field"
            >
        </div>

        <div class="category-filter-wrapper">
            <div class="filter-buttons-container" id="filterMenu">

                @foreach($categories as $category)
                    <button 
                        type="button"
                        wire:click="filterByCategory({{ $category->id }})"
                        class="filter-btn {{ $selectedCategory == $category->id ? 'filter-active' : '' }}"
                    >
                        <img 
                            src="{{ asset($categoryImages[$category->name] ?? 'imagini/menu/placeholder.svg') }}" 
                            class="filter-icon"
                        >
                        <span class="filter-text">{{ $category->display_name }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Items Grid --}}
    <div class="items-grid">
        @forelse($filteredItems as $item)
            <div class="item-card" wire:click="selectItem({{ $item->id }})">
                <img src="{{ asset('storage/' . $item->image) }}" class="item-card-image">
                <h3 class="item-card-title">{{ $item->name }}</h3>
                <span class="item-card-price">{{ $item->base_price }} lei</span>
                <p class="item-card-desc">{{ Str::limit($item->description, 40) }}</p>
                <div class="item-card-status {{ $item->is_available ? 'status-available' : 'status-unavailable' }}">
                    {{ $item->is_available ? 'Available' : 'Unavailable' }}
                </div>
            </div>
        @empty
            <p class="no-items">No menu items found.</p>
        @endforelse
    </div>

    {{-- Detail Panel --}}
    @if($selectedItem)
        <div class="panel-overlay" wire:click="$set('selectedItem', null)"></div>
        <div class="detail-panel">
            <button class="panel-close" wire:click="closePanel">✕</button>
            
            <div class="panel-content">
                <img src="{{ asset('storage/' . $selectedItem->image) }}" class="panel-image">
                
                <h2 class="panel-title">{{ $selectedItem->name }}</h2>
                <p class="panel-price">{{ $selectedItem->base_price }} lei</p>
                <p class="panel-description">{{ $selectedItem->description }}</p>
                
                <div class="panel-meta">
                    <p><strong>Category:</strong> {{ $selectedItem->category->display_name }}</p>
                    <p><strong>Sort Order:</strong> {{ $selectedItem->sort_order }}</p>
                    <p><strong>Status:</strong> 
                        <span class="meta-badge {{ $selectedItem->is_available ? 'badge-active' : 'badge-inactive' }}">
                            {{ $selectedItem->is_available ? 'Available' : 'Unavailable' }}
                        </span>
                    </p>
                </div>
                
                <div class="panel-actions">
                    <button wire:click="edit({{ $selectedItem->id }})" class="panel-edit">Edit</button>
                    <button wire:click="delete({{ $selectedItem->id }})" 
                            onclick="return confirm('Delete this menu item?')" 
                            class="panel-delete">Delete</button>
                </div>
            </div>
        </div>
    @endif

    {{-- Pagination --}}
    <div class="pagination-section">
        {{ $filteredItems->links() }}
    </div>
</div>