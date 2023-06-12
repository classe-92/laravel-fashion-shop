<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cover_image', 'description', 'price', 'brand_id', 'category_id', 'texture_id', 'slug'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function texture()
    {
        return $this->belongsTo(Texture::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}