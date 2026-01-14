<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'stock',
        'brand',
        'image',
    ];

     public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Product tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
