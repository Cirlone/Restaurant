<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CategoryManager extends Component
{
    use WithPagination;

    public $showForm = false;
    public $editingId = null;
    
    public $name = '';
    public $display_name = '';
    public $description = '';
    public $icon = '';
    public $image = '';
    public $sort_order = 0;
    public $is_active = true;

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name',
        'display_name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'icon' => 'nullable|string|max:255',
        'image' => 'nullable|string|max:255',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function mount()
    {
        $this->sort_order = Category::max('sort_order') + 1;
    }

    public function create()
    {
        $this->resetForm();
        $this->showForm = true;
        $this->editingId = null;
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->editingId = $id;
        $this->name = $category->name;
        $this->display_name = $category->display_name;
        $this->description = $category->description;
        $this->icon = $category->icon;
        $this->image = $category->image;
        $this->sort_order = $category->sort_order;
        $this->is_active = $category->is_active;
        $this->showForm = true;
    }

    public function save()
    {
        if ($this->editingId) {
            $this->rules['name'] = 'required|string|max:255|unique:categories,name,' . $this->editingId;
        }

        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'display_name' => $this->display_name,
            'description' => $this->description,
            'icon' => $this->icon,
            'image' => $this->image,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
        ];

        if ($this->editingId) {
            Category::find($this->editingId)->update($data);
            session()->flash('message', 'Category updated successfully.');
        } else {
            Category::create($data);
            session()->flash('message', 'Category created successfully.');
        }

        $this->resetForm();
        $this->showForm = false;
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Category deleted successfully.');
    }

    public function toggleActive($id)
    {
        $category = Category::find($id);
        $category->update(['is_active' => !$category->is_active]);
    }

    public function resetForm()
    {
        $this->reset(['name', 'display_name', 'description', 'icon', 'image', 'editingId']);
        $this->sort_order = Category::max('sort_order') + 1;
        $this->is_active = true;
    }

    public function render()
    {
        return view('livewire.category-manager', [
            'categories' => Category::orderBy('sort_order')->paginate(10),
        ]);
    }
}