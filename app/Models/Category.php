<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'display_name',
        'description',
        'icon',
        'image',
        'sort_order',
        'is_active',
    ];
    public function menuItems()
{
    return $this->hasMany(MenuItem::class);
}
}