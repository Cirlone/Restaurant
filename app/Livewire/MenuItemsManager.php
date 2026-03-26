<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MenuItem;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class MenuItemsManager extends Component
{
    use WithPagination, WithFileUploads;

    public $showForm = false;
    public $editingId = null;
    
    public $name = '';
    public $description = '';
    public $base_price = '';
    public $image;
    public $category_id = '';
    public $is_available = true;
    public $sort_order = 0;
    public $selectedCategory = null;
    public $selectedItem = null;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'base_price' => 'required|numeric|min:0',
        'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:12048',
        'category_id' => 'required|exists:categories,id',
        'is_available' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function mount()
    {
        $this->sort_order = MenuItem::max('sort_order') + 1;
    }

    public function create()
    {
        $this->resetForm();
        $this->showForm = true;
        $this->editingId = null;
    }

    public function edit($id)
    {
        $item = MenuItem::findOrFail($id);
        $this->editingId = $id;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->base_price = $item->base_price;
        $this->category_id = $item->category_id;
        $this->is_available = $item->is_available;
        $this->sort_order = $item->sort_order;
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'base_price' => $this->base_price,
            'category_id' => $this->category_id,
            'is_available' => $this->is_available,
            'sort_order' => $this->sort_order,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('menu-items', 'public');
        }

        if ($this->editingId) {
            $item = MenuItem::find($this->editingId);
            $item->update($data);
            session()->flash('message', 'Menu item updated successfully.');
        } else {
            MenuItem::create($data);
            session()->flash('message', 'Menu item created successfully.');
        }

        $this->resetForm();
        $this->showForm = false;
    }

    public function delete($id)
    {
        MenuItem::find($id)->delete();
        session()->flash('message', 'Menu item deleted successfully.');
    }
public function closePanel()
{
    $this->selectedItem = null;
    $this->dispatch('$refresh');
}
    public function toggleAvailability($id)
    {
        $item = MenuItem::find($id);
        $item->update(['is_available' => !$item->is_available]);
    }

    public function filterByCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function selectItem($itemId)
    {
        $this->selectedItem = MenuItem::with('category')->find($itemId);
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'base_price', 'image', 'category_id', 'editingId']);
        $this->sort_order = MenuItem::max('sort_order') + 1;
        $this->is_available = true;
    }

    public $search = '';

public function render()
{
    $query = MenuItem::with('category')->orderBy('sort_order');
    
    if ($this->selectedCategory) {
        $query->where('category_id', $this->selectedCategory);
    }
    
    if ($this->search) {
        $query->where('name', 'like', '%' . $this->search . '%');
    }
    
    return view('livewire.menu-items-manager', [
        'filteredItems' => $query->paginate(9),
        'categories' => Category::where('is_active', true)->orderBy('sort_order')->get(),
        'categoryImages' => [
            'pizza' => 'imagini/menu/pepperoni.svg',
            'pasta' => 'imagini/menu/paste milaneze.png',
            'dessert' => 'imagini/menu/desert2.svg',
            'grill' => 'imagini/menu/grill ceafa de porc.png',
            'drinks' => 'imagini/menu/7-2-sprite-png-clipart.png',
            'asian' => 'imagini/menu/asian sushi.png',
        ],
    ]);
}
    
}