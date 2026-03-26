<div>
    <div class="category-header">
        <h2 class="h2-dashboard">Categories</h2>
        <button wire:click="create" class="btn-create-category">
            New Category
        </button>
    </div>

    @if(session()->has('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($showForm)
        <div class="category-form">
            <h3>{{ $editingId ? 'Edit Category' : 'Add New Category' }}</h3>
            
            <form wire:submit="save">
                <div class="form-group" id="form-group-category">
                    <label>Name (for URL slug)</label>
                    <input type="text" wire:model="name" class="form-input">
                    @error('name') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <div class="form-group" id="form-group-category">
                    <label>Display Name</label>
                    <input type="text" wire:model="display_name" class="form-input">
                    @error('display_name') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <div class="form-group" id="form-group-category">
                    <label>Description</label>
                    <textarea wire:model="description" class="form-input" rows="3"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group" id="form-group-category">
                        <label>Sort Order</label>
                        <input type="number" wire:model="sort_order" class="form-input sort-order-input">
                    </div>

                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" wire:model="is_active">
                            Active
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" wire:click="$set('showForm', false)" class="btn-cancel">
                        Cancel
                    </button>
                    <button type="submit" class="btn-save">
                        {{ $editingId ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    @endif

    <div class="table-scroll">
    <table class="categories-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->sort_order }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->display_name }}</td>
                    <td>
                        <button wire:click="toggleActive({{ $category->id }})" 
                                class="status-badge {{ $category->is_active ? 'active' : 'inactive' }}">
                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                        </button>
                    </td>
                    <td>
                        <button wire:click="edit({{ $category->id }})" class="edit-text-btn">
                            Edit
                        </button>
                        <button wire:click="delete({{ $category->id }})" 
                                onclick="return confirm('Delete this category?')" 
                                class="delete-text-btn">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="pagination-wrapper">
        {{ $categories->links() }}
    </div>
</div>