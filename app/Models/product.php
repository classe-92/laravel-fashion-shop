<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

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
}

//return $this->belongsToMany(Role::class)->withPivot('active', 'created_by');
//return $this->belongsToMany(Role::class)->withTimestamps();
