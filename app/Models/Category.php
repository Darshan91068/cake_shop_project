<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use arr;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'category_description', 'category_image'];
    public function products()
    {
        return $this->hasMany(Product::class, 'pro_category_id', 'id');
    }
}
