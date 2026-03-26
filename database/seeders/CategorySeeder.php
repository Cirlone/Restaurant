<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    $categories = [
        ['name' => 'pizza', 'slug' => 'pizza', 'display_name' => 'Pizza', 'sort_order' => 1],
        ['name' => 'pasta', 'slug' => 'pasta', 'display_name' => 'Pasta', 'sort_order' => 2],
        ['name' => 'dessert', 'slug' => 'dessert', 'display_name' => 'Dessert', 'sort_order' => 3],
        ['name' => 'grill', 'slug' => 'grill', 'display_name' => 'Grill', 'sort_order' => 4],
        ['name' => 'drinks', 'slug' => 'drinks', 'display_name' => 'Drinks', 'sort_order' => 5],
        ['name' => 'asian', 'slug' => 'asian', 'display_name' => 'Asian', 'sort_order' => 6],
    ];
    
    foreach ($categories as $category) {
        \App\Models\Category::create($category);
    }
}
}
