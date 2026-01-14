<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;
  protected $fillable = [
        'name',
        'parent_id',
    ];

    // Parent category (Jewelry)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Subcategories (Rings, Necklaces)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Products under this category
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
